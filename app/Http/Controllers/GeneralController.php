<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Category;
use App\Comment;
use App\ExhibitionPost;
use App\Menu;
use App\Post;
use App\PostView;
use App\User;
use App\Video;
use App\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //Start Homepage Populating Area
    public function homeSliderArea()
    {
        $sliders = Post::join('categories', 'categories.category_id', '=', 'posts.category_id')
            ->join('users', 'users.id', '=', 'posts.author_id')
            ->where('posts.publish_status', 1)
            ->limit(3)
            ->orderBy('post_id', 'DESC')
            ->get();

        return response()->json([
            'sliders' => $sliders,
            'message' => 'Success'
        ], 200);

    }

    public function firstRowArea()
    {
        $interviews = Post::join('categories', 'categories.category_id', '=', 'posts.category_id')
            ->join('users', 'users.id', '=', 'posts.author_id')
            ->where('posts.publish_status', 1)
            ->where('categories.category_name', "সাক্ষাৎকার")
            ->limit(1)
            ->orderBy('post_id', 'DESC')
            ->first();
        $articles = Post::join('categories', 'categories.category_id', '=', 'posts.category_id')
            ->join('users', 'users.id', '=', 'posts.author_id')
            ->where('posts.publish_status', 1)
            ->where('categories.category_name', "প্রবন্ধ")
            ->limit(2)
            ->orderBy('post_id', 'DESC')
            ->get();
        $politics = Post::join('categories', 'categories.category_id', '=', 'posts.category_id')
            ->join('users', 'users.id', '=', 'posts.author_id')
            ->where('posts.publish_status', 1)
            ->where('categories.category_name', "রাজনীতি")
            ->limit(2)
            ->orderBy('post_id', 'DESC')
            ->get();

        return response()->json([
            'interviews' => $interviews,
            'articles' => $articles,
            'politics' => $politics,
            'message' => 'Success'
        ], 200);

    }

    //End Homepage Poplating Area
    public function index(Request $request)
    {
        $visitor_ip = $this->get_client_ip();
        $this->saveVisitorCount($visitor_ip);
        $navbar = Category::get();
        $featured_posts = Post::join('categories', 'categories.category_id', '=', 'posts.category_id')
            ->where('posts.publish_status', 1)
            ->where('posts.pin_post', 1)
            ->limit(5)
            ->orderBy('post_id', 'DESC')
            ->get([
                'posts.post_id',
                'posts.post_headline',
                'posts.post_details',
                'posts.post_featured_image',
                'posts.created_at',
                'posts.updated_at',
                'categories.category_name',
            ]);
        $latest_posts = Post::join('categories', 'categories.category_id', '=', 'posts.category_id')
            ->where('posts.publish_status', 1)
            ->limit(15)
            ->orderBy('post_id', 'DESC')
            ->get([
                'posts.post_id',
                'posts.post_headline',
                'posts.post_details',
                'posts.created_at',
                'posts.updated_at',
                'posts.post_featured_image',
                'categories.category_name',
            ]);

        $videos = Video::limit(5)->orderBy('created_at', 'DESC')->get();

        $weekly_posts = Post::join('categories', 'categories.category_id', '=', 'posts.category_id')
            ->where('posts.publish_status', 1)
            ->limit(8)
            ->get();

        $more_posts = Post::join('categories', 'categories.category_id', '=', 'posts.category_id')
            ->where('posts.publish_status', 1)
            ->limit(3)
            ->get();

        return view('general.home.index')
            ->with('all', $navbar)
            ->with('featured_posts', $featured_posts)
            ->with('latest_posts', $latest_posts)
            ->with('weekly_posts', $weekly_posts)
            ->with('more_posts', $more_posts)
            ->with('videos', $videos);


    }

    public function postDetails($id, $headline)
    {
        //return $headline;
        $visitor_ip = "192.2566.5";
        $this->saveVisitorCount($visitor_ip);
        $navbar = Category::get();
        $post = Post::where('post_id', $id)
            ->join('users', 'users.id', '=', 'posts.author_id')
            ->first();
        $selected_navbar = Menu::join('categories', 'categories.category_id', '=', 'menus.category_id')->get();
        $related_post = Post::
        join('categories', 'categories.category_id', '=', 'posts.category_id')
            ->where('categories.category_id', $post->category_id)
            ->limit(5)->orderBy('post_id', 'DESC')
            ->get();

        $popular_posts =  Post::join('categories', 'categories.category_id', '=', 'posts.category_id')
            ->limit(5)->orderBy('post_id', 'DESC')
            ->get();
        $advertisement = Advertisement::get();
        $comments = Comment::where('post_id', $id)->where('approve_status', true)->get();
        $this->postViewCounter($id);
        return view('general.details.index')
            ->with('all', $navbar)
            ->with('post', $post)
            ->with('related_posts', $related_post)
            ->with('popular_posts', $popular_posts)
            ->with('advertisement', $advertisement)
            ->with('comments', $comments)
            ->with('navbars', $selected_navbar);
    }


    public function videoDetails($id, $headline)
    {

        //return $headline;
        $visitor_ip = "192.2566.5";
        $this->saveVisitorCount($visitor_ip);
        $navbar = Category::get();
        $post = Video::where('video_id', $id)
            ->join('users', 'users.id', '=', 'videos.author_id')
            ->first();
        $selected_navbar = Menu::join('categories', 'categories.category_id', '=', 'menus.category_id')->get();
        $related_post = Post::where('category_id', $post->category_id)->limit(7)->orderBy('post_id', 'DESC')->get();
        $recent_posts = Post::limit(5)->orderBy('post_id', 'DESC')->get();
        $advertisement = Advertisement::get();
        $comments = Comment::where('post_id', $id)->join('users', 'users.id', '=', 'comments.user_id')->get();
        $this->postViewCounter($id);
        return view('general.video.details')
            ->with('all', $navbar)
            ->with('post', $post)
            ->with('related_posts', $related_post)
            ->with('recent_posts', $recent_posts)
            ->with('advertisement', $advertisement)
            ->with('comments', $comments)
            ->with('navbars', $selected_navbar);

    }

    public function exhibitionDetails($id)
    {
        $visitor_ip = "192.2566.5";
        $this->saveVisitorCount($visitor_ip);
        $navbar = Category::get();
        $post = ExhibitionPost::join('users', 'users.id', '=', 'exhibition_posts.author_id')
            ->get();
        $selected_navbar = Menu::join('categories', 'categories.category_id', '=', 'menus.category_id')->get();
        $related_post = Post::limit(7)->orderBy('post_id', 'DESC')->get();
        $recent_posts = Post::limit(5)->orderBy('post_id', 'DESC')->get();
        $advertisement = Advertisement::get();


        $this->postViewCounter($id);
        return view('general.details.exhibition')
            ->with('all', $navbar)
            ->with('post', $post)
            ->with('related_posts', $related_post)
            ->with('recent_posts', $recent_posts)
            ->with('advertisement', $advertisement)
            ->with('navbars', $selected_navbar);
    }

    public function selectedCategoryPost($category_name)
    {
        $visitor_ip = "192.2566.5";
        $this->saveVisitorCount($visitor_ip);
        $posts = Post::join('categories', 'categories.category_id', '=', 'posts.category_id')
            ->where('categories.category_name', $category_name)
            ->where('posts.publish_status', 1)
            ->limit(50)
            ->get();
        $navbar = Category::get();
        $selected_navbar = Menu::join('categories', 'categories.category_id', '=', 'menus.category_id')->get();
        $recent_posts = Post::limit(5)->orderBy('post_id', 'DESC')->get();
        $advertisement = Advertisement::get();
        return view('general.categorize_post.index')
            ->with('all', $navbar)
            ->with('posts', $posts)
            ->with('recent_posts', $recent_posts)
            ->with('advertisement', $advertisement)
            ->with('navbars', $selected_navbar);

    }

    public function search(Request $request)
    {
        $visitor_ip = "192.2566.5";
        $visitor_ip = "192.2566.5";
        $this->saveVisitorCount($visitor_ip);

        $searchTerm = $request->input('query');
        $posts = Post::where('post_headline', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('post_details', 'LIKE', '%' . $searchTerm . '%')
            ->where('publish_status', 1)
            ->limit(15)
            ->get();

        $advertisement = Advertisement::get();
        $navbar = Category::get();
        $selected_navbar = Menu::join('categories', 'categories.category_id', '=', 'menus.category_id')->get();


        return view('general.categorize_post.index')
            ->with('all', $navbar)
            ->with('posts', $posts)
            ->with('advertisement', $advertisement)
            ->with('navbars', $selected_navbar);

    }

    public function monthSearch($searchTerm)
    {
        $visitor_ip = "192.2566.5";
        $visitor_ip = "192.2566.5";
        //$searchTerm="01";
        $this->saveVisitorCount($visitor_ip);
        $posts = Post::limit(100)->get();
        /*return $posts = Post::where('updated_at', 'LIKE', '%' . $searchTerm . '%')
            ->where('publish_status', 1)
            ->get();*/
        $advertisement = Advertisement::get();
        $navbar = Category::get();
        $selected_navbar = Menu::join('categories', 'categories.category_id', '=', 'menus.category_id')->get();


        return view('general.categorise_post')
            ->with('all', $navbar)
            ->with('posts', $posts)
            ->with('advertisement', $advertisement)
            ->with('navbars', $selected_navbar);

    }

    public function monthWiseSearch(Request $request)
    {
        $month = $request['month'];
        $year = $request['year'];
        $visitor_ip = "192.2566.5";
        $visitor_ip = "192.2566.5";
        //$searchTerm="01";
        $this->saveVisitorCount($visitor_ip);

        $year = $request['year'];
        $month = $request['month'];
        $posts = Post::whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->where('publish_status', 1)
            ->limit(15)
            ->get();
        /*return $posts = Post::where('updated_at', 'LIKE', '%' . $searchTerm . '%')
            ->where('publish_status', 1)
            ->get();*/
        $advertisement = Advertisement::get();
        $navbar = Category::get();
        $selected_navbar = Menu::join('categories', 'categories.category_id', '=', 'menus.category_id')->get();


        return view('general.categorize_post.index')
            ->with('all', $navbar)
            ->with('posts', $posts)
            ->with('advertisement', $advertisement)
            ->with('navbars', $selected_navbar);

    }

    public function contact()
    {
        $navbar = Category::get();
        $selected_navbar = Menu::join('categories', 'categories.category_id', '=', 'menus.category_id')->get();

        return view('general.contact.index')
            ->with('navbars', $selected_navbar)
            ->with('all', $navbar);
    }

    public function authorPost($author_id)
    {
        $visitor_ip = "192.2566.5";
        $this->saveVisitorCount($visitor_ip);

        $posts = Post::join('categories', 'categories.category_id', '=', 'posts.category_id')
            ->where('posts.author_id', $author_id)
            ->where('posts.publish_status', 1)
            ->limit(50)
            ->get();
        $navbar = Category::get();
        $selected_navbar = Menu::join('categories', 'categories.category_id', '=', 'menus.category_id')->get();
        $recent_posts = Post::limit(5)->orderBy('post_id', 'DESC')->where('publish_status', 1)->get();
        $advertisement = Advertisement::get();
        $author = User::where('id', $author_id)->first();
        return view('general.author.author_post')
            ->with('all', $navbar)
            ->with('posts', $posts)
            ->with('recent_posts', $recent_posts)
            ->with('advertisement', $advertisement)
            ->with('author', $author)
            ->with('navbars', $selected_navbar);

    }

    private function postViewCounter($id)
    {

        $result = PostView::where('post_id', $id)->first();
        if (is_null($result)) {
            PostView::create(array('post_id' => $id, 'views' => 1));
        } else {
            PostView::where('post_id', $id)->update(array('post_id' => $id, 'views' => $result->views + 1));
        }
    }

    private function saveVisitorCount($visitor_ip)
    {
        $now_hour = date('H');
        $column = "hour_" . $now_hour;
        $is_exist = Visitor::whereDate('created_at', Carbon::today())->first();

        if (is_null($is_exist)) {

            try {

                Visitor::create(array($column => 1));

            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        } else {
            try {
                $counter = $is_exist->$column + 1;
                Visitor::whereDate('created_at', Carbon::today())
                    ->update(array($column => $counter));
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }
        }

    }

    function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';


        return $ipaddress;
    }
}
