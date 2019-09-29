<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
    <div class="container">
        <!--        <a class="navbar-brand" href="#">প্রতিধ্বনি </a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06"
                aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample06">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/"><i class="fa fa-home"></i> হোম <span
                                class="sr-only">(current)</span></a>
                </li>

                @if($navbars)
                    {{--@foreach($navbars as $navbar)
                        <li class="nav-item">
                            <a class="nav-link"
                               href="/topics/{{$navbar->category_name}}">{{$navbar->category_name}} </a>

                        </li>

                        --}}{{-- <li class="nav-item">
                             <a class="nav-link--}}{{----}}{{-- dropdown-toggle--}}{{----}}{{--" href="/topics/{{$navbar->category_name}}"
                                id="dropdown06"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">{{$navbar->category_name}} </a>

                             @foreach($all as $hello)
                                 @if($hello->parent_category==$navbar->category_id)
                                     <div class="dropdown-menu" aria-labelledby="dropdown06">
                                         <a class="dropdown-item"
                                            href="/topics/{{$hello->category_name}}">{{$hello->category_name}}</a>
                                     </div>
                                 @endif
                             @endforeach

                         </li>--}}{{--
                    @endforeach--}}
                @endif


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown06"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">গদ্য</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown06">
                        <a class="dropdown-item"
                           href="/topics/স্বদেশ">প্রবন্ধ</a>
                        <a class="dropdown-item"
                           href="/topics/পরদেশ">তত্ত্বকথা</a>


                        <a class="dropdown-item"
                           href="/topics/পুনর্মুদ্রণ">মত মতান্তর </a>
                           <a class="dropdown-item"
                              href="/topics/পুনর্মুদ্রণ">ইতিহাস </a>

                        <a class="dropdown-item"
                           href="/topics/পুনর্মুদ্রণ">আত্মজীবনী </a>

                        <a class="dropdown-item"
                           href="/topics/পুনর্মুদ্রণ">ভ্রমণ </a>
                    </div>
                </li>



                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown06"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">রাজনীতি</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown06">
                        <a class="dropdown-item"
                           href="/topics/বর্তমান">বর্তমান</a>
                        <a class="dropdown-item"
                           href="/topics/পরদেশ">পরদেশ</a>
                        <a class="dropdown-item"
                           href="/topics/পুনর্মুদ্রণ">পুনর্মুদ্রণ </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown06"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">কবিতা</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown06">
                        <a class="dropdown-item"
                           href="/topics/একক কবিতা">একক কবিতা</a>
                        <a class="dropdown-item"
                           href="/topics/গুচ্ছকবিতা">গুচ্ছকবিতা</a>
                        <a class="dropdown-item"
                           href="/topics/পরদেশী কবিতা">পরদেশী কবিতা </a>
                        <a class="dropdown-item"
                           href="/topics/পুনর্মুদ্রণ">পুনর্মুদ্রণ</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown06"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">গল্প</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown06">
                        <a class="dropdown-item"
                           href="/topics/স্বদেশ">স্বদেশ</a>
                        <a class="dropdown-item"
                           href="/topics/পরদেশ">পরদেশ</a>
                        <a class="dropdown-item"
                           href="/topics/অনুগল্প">অনুগল্প</a>
                        <a class="dropdown-item"
                           href="/topics/পুনর্মুদ্রণ">পুনর্মুদ্রণ </a>
                    </div>
                </li>






                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown06"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">উপন্যাস </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown06">
                        <a class="dropdown-item"
                           href="/topics/স্বদেশ">স্বদেশ</a>
                        <a class="dropdown-item"
                           href="/topics/নভেল">নভেল</a>

                        <a class="dropdown-item"
                           href="/topics/পরদেশ">পরদেশ</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown06"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">পুস্তিকা</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown06">
                        <a class="dropdown-item"
                           href="/topics/বই সংবাদ">বই সংবাদ</a>
                        <a class="dropdown-item"
                           href="/topics/সমালোচনা">সমালোচনা</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/topics/ভ্রমণ">সাক্ষাৎকার</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        সংস্কৃতি
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">নাটক</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/topics/নাট্য সংবাদ">নাট্য সংবাদ</a></li>
                                <li><a class="dropdown-item" href="/topics/নাট্য সমালোচনা">নাট্য সমালোচনা</a></li>


                                {{--  <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">চিত্রকলা</a>
                                      <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
                                          <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                      </ul>
                                  </li>--}}

                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">চিত্রকলা</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/topics/শিল্প সংবাদ">শিল্প সংবাদ</a></li>
                                <li><a class="dropdown-item" href="/topics/িল্প সমালোচনা">শিল্প সমালোচনা</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">স্থাপত্যকলা</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/topics/স্থাপত্যসংবাদ">স্থাপত্যসংবাদ</a></li>
                                <li><a class="dropdown-item" href="/topics/স্থাপত্যালোচনা">স্থাপত্যালোচনা</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">চলচ্চিত্র</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/topics/চলচ্চিত্র সংবাদ">চলচ্চিত্র সংবাদ</a></li>
                                <li><a class="dropdown-item" href="/topics/চলচ্চিত্র আলোচন">চলচ্চিত্র আলোচনা</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="/topics/সংগীত">সংগীত</a></li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="/topics/অনুবাদ">অনুবাদ</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        বিবিধ
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">পুরাণকথা</a>
                            <ul class="dropdown-menu">
                              <a class="dropdown-item"
                                 href="/topics/মিথ">মিথ</a>
                              <a class="dropdown-item"
                                 href="/topics/ধর্মতত্ত্ব">ধর্মতত্ত্ব</a>
                                 <a class="dropdown-item"
                                    href="/topics/লোককাহিনী">লোককাহিনী</a>


                            </ul>
                        </li>

                        <li><a class="dropdown-item" href="/topics/অগ্রন্থিত রচনা">অগ্রন্থিত রচনা</a></li>
                        <li><a class="dropdown-item" href="/topics/অগ্রন্থিত রচনা">নিষিদ্ধ বই</a></li>


                    </ul>
                </li>





            {{--     <li class="nav-item">
                     <a class="nav-link" href="/topics/আত্মজীবনী">আত্মজীবনী</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/topics/ভ্রমণ">ভ্রমণ</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/topics/ই-প্রদর্শনী">ই-প্রদর্শনী</a>
                 </li>--}}

{{--                <li class="nav-item">
                    <a class="nav-link" href="/contact">যোগাযোগ</a>
                </li>--}}

                @if($all)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown06"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">সব </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown06">

                            @foreach($all as $nav)
                                @php($bool=true)
                                @foreach($navbars as $navbar)
                                    @if($nav->category_id==$navbar->category_id)
                                        @php($bool=false)
                                    @elseif($nav->parent_category>0)
                                        @php($bool=false)
                                    @endif
                                @endforeach
                                @if($bool==true)
                                    <a class="dropdown-item"
                                       href="/topics/{{$navbar->category_name}}">{{$nav->category_name}}</a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                @endif
            </ul>
            <form class="form-inline my-2 my-md-0" method="get" action="/search"
                  enctype="multipart/form-data">
               {{-- <input type="hidden" class="form-control" name="_token"
                       value="{{csrf_token()}}">
--}}
                <input class="form-control" type="text" placeholder="খুঁজুন.." name="query">
            </form>
        </div>
    </div>
</nav>
