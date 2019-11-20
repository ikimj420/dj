<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dj</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Dj">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('include.css')
        <link rel="stylesheet" type="text/css" href="{!! asset('styles/main_styles.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('styles/responsive.css') !!}">

    </head>
    <body>

        <div class="super_container">

            <!-- Header -->
            @include('include.header')

            <!-- Menu -->
            @include('include.menu')

            <!-- Home -->
            <div class="home">
                <div class="home_slider_container">
                    <!-- Home Slider -->
                    <div class="owl-carousel owl-theme home_slider">
                        <!-- Slide -->
                        <div class="owl-item">
                            <div class="background_image" style="background-image:url({!! asset('/storage/images/index.svg') !!})"></div>
                            <div class="home_container">
                                <div class="home_container_inner d-flex flex-column align-items-center justify-content-center">
                                    <div class="home_content text-center">
                                        <div class="home_subtitle">New single release</div>
                                        <div class="home_title"><h1>Love is all around</h1></div>
                                        <div class="home_link"><a href="#">Listen on Soundcloud</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide -->
                        <div class="owl-item">
                            <div class="background_image" style="background-image:url({!! asset('/storage/images/index.svg') !!})"></div>
                            <div class="home_container">
                                <div class="home_container_inner d-flex flex-column align-items-center justify-content-center">
                                    <div class="home_content text-center">
                                        <div class="home_subtitle">New single release</div>
                                        <div class="home_title"><h1>Love is all around</h1></div>
                                        <div class="home_link"><a href="#">Listen on Soundcloud</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide -->
                        <div class="owl-item">
                            <div class="background_image" style="background-image:url({!! asset('/storage/images/index.svg') !!})"></div>
                            <div class="home_container">
                                <div class="home_container_inner d-flex flex-column align-items-center justify-content-center">
                                    <div class="home_content text-center">
                                        <div class="home_subtitle">New single release</div>
                                        <div class="home_title"><h1>Love is all around</h1></div>
                                        <div class="home_link"><a href="#">Listen on Soundcloud</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shows">
                <div class="container-fluid">
                    @include('include.flash-message')
                    <div class="col-sm-2">
                        @include('home.include.add')
                    </div>
                </div>
            </div>

            <!-- Shows -->
            <div class="shows">
                <div class="container">
                    <div class="row" style="z-index:10;">
                        <div class="col">
                            <div class="section_title_container">
                                <div class="section_subtitle"></div>
                                <div class="section_title"><h1>Upcoming Shows</h1></div>
                            </div>
                        </div>
                    </div>
                    <div class="row shows_row">
                        <!-- Shows List -->
                        <div class="col-lg-8 order-lg-1 order-2 shows_list_col">
                            <div class="shows_list_container">
                                <ul class="shows_list">
                                    @forelse($homes as $home)
                                        <!-- Show -->
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div><div class="show_date">{{ \Carbon\Carbon::parse($home->date)->format('M-d')}}</div></div>
                                            <div class="show_info d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-start justify-content-center">
                                                @guest()
                                                    <div class="show_name">{!! $home->title !!}</div>
                                                @endguest
                                                @auth()
                                                    @if(Auth::user()->isAdmin === 1)
                                                        <div class="show_name"><a href="/home/{!! $home->id !!}">{!! $home->title !!}</a></div>
                                                    @endif
                                                @endauth
                                                <div class="show_location">{!! $home->place !!}</div>
                                            </div>
                                            <div class="ml-auto"><div class="show_shop trans_200"><a href="{!! $home->url !!}" target="_blank" >Site</a></div></div>
                                        </li>
                                    @empty
                                        <p>
                                            Noting To Show
                                        </p>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!-- Shows Image -->
                        <div class="col-lg-4 order-lg-2 order-1">
                            <div class="shows_image">
                                <div class="image_overlay"></div>
                                <img src="{!! asset('/storage/images/party.svg') !!}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Artist -->
            <div class="artist">
                <div class="container">
                    <div class="row">
                        <!-- Artist Image -->
                        <div class="col-lg-4 artist_image_col">
                            <div class="artist_image">
                                <img src="{!! asset('/storage/user/'.$user->pics) !!}" alt="">
                            </div>
                        </div>
                        <!-- Artist Content -->
                        <div class="col-lg-7 offset-lg-1">
                            <div class="artist_content">
                                <div class="section_title_container">
                                    <div class="section_subtitle"></div>
                                    <div class="section_title"><h1>{!! $user->name !!}</h1></div>
                                </div>
                                <div class="artist_text">
                                   <p>
                                       {!! $user->bio !!}
                                   </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            @include('include.footer')

        </div>

            @include('include.js')
            <script src="{!! asset('js/custom.js') !!}"></script>
    </body>
</html>
