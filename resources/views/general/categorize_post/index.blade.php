@extends('layouts.general')
@section('title', 'Details')
@section('content')

    <div class="container">

        <div class="row">

            <!--Top Advertisement Start-->
            <div class="container">
                <div class="row">

                    <div class="col-12 full-row-add">
                        <div class="text-center">
                            <img src="/img/add.gif" width="100%" height="90px">
                        </div>
                    </div>
                </div>

            </div>
            <!--Top Advertisement End-->
            <div class="col-12 col-md-8 news-details">

                @if (count($posts) > 0)
                    <div class="col-12 row">
                        @php($i=1)
                        @foreach($posts as $post)
                            @php($i++)

                            <div class="col-4">
                                <a href="/article/details/{{$post->post_id}}/{{str_replace(' ', '-', $post->post_headline)}}">
                                    <img src="/images/post/{{$post->post_featured_image}}" class="category_post_image" width="100%"/>
                                </a>
                            </div>

                            <div class="col-8">
                                <a href="/article/details/{{$post->post_id}}/{{str_replace(' ', '-', $post->post_headline)}}">
                                    <h5>{{$post->post_headline}}</h5>
                                    <div class="col-12 horizontal-line"></div>
                                    <p style="overflow: hidden;display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">{{$post->post_details}}</p>

                                </a>
                                <a href="/article/details/{{$post->post_id}}/{{str_replace(' ', '-', $post->post_headline)}}"
                                   class="btn btn-outline-danger btn-sm">আরো
                                    দেখুন </a>
                                <hr>
                            </div>


                        @endforeach
                    </div>

                @else

                    <div class="alert alert-info">
                        Nothing found here.
                    </div>
                @endif
            </div>


            <div class="col-md-4 col-12">

                <div class="row  right-side">
                    <div class="detail-page-right-side">
                        <h4>সাম্প্রতিক পোস্ট</h4>
                        @if(isset($recent_posts))
                            @foreach($recent_posts as $recent_post)
                                <hr>
                                <div class="news-grid">
                                    <a href="/article/details/{{$recent_post->post_id}}/{{str_replace(' ', '-', $recent_post->post_headline)}}">
                                        <div class="row">
                                            <div class="col-md-4"><img
                                                        src="/images/post/{{$recent_post->post_featured_image}}"
                                                        width="100%"/></div>
                                            <div class="col-md-8">
                                                <h4>{{$recent_post->post_headline}}</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="row  right-side">
                    <div class="detail-page-right-side">
                        <img src="/img/grid_ad.gif" width="100%"/>
                    </div>
                </div>
                <div class="row  right-side">
                    <div class="detail-page-right-side">
                        <h4>ক্যাটেগরি </h4>
                        <hr>
                        <ul class="list-unstyled">
                            @foreach($all as $nav)
                                <li><a href="#"><i
                                                class="fa fa-chevron-right checvron-size"></i> {{$nav->category_name}}
                                    </a><span
                                            class="post-count pull-right">(10)</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row  right-side">
                    <div class="detail-page-right-side">
                        <h4>আর্কাইভ </h4>
                        <hr>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fa fa-chevron-right"></i> জানুয়ারি</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right"></i> ফেব্রুয়ারি</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right"></i> মার্চ</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right"></i> এপ্রিল</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        $('a.share').click(function (e) {
            e.preventDefault();
            var $link = $(this);
            var href = $link.attr('href');
            var network = $link.attr('data-network');

            var networks = {
                facebook: {width: 600, height: 300},
                twitter: {width: 600, height: 254},
                google: {width: 515, height: 490},
                linkedin: {width: 600, height: 473}
            };

            var popup = function (network) {
                var options = 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,';
                window.open(href, '', options + 'height=' + networks[network].height + ',width=' + networks[network].width);
            }

            popup(network);
        });
    </script>

    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
@endsection
