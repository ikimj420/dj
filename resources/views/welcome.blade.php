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
                            <div class="background_image" style="background-image:url({!! asset('/storage/images/index.jpg') !!})"></div>
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
                            <div class="background_image" style="background-image:url({!! asset('/storage/images/index.jpg') !!})"></div>
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
                            <div class="background_image" style="background-image:url({!! asset('/storage/images/index.jpg') !!})"></div>
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
                                            <div><div class="show_date">{!! $home->date !!}</div></div>
                                            <div class="show_info d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-start justify-content-center">
                                                <div class="show_name">{!! $home->title !!}</div>
                                                <div class="show_location">{!! $home->place !!}</div>
                                            </div>
                                            <div class="ml-auto"><div class="show_shop trans_200"><a href="{!! $home->url !!} " target="_blank" >Site</a></div></div>
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
                                <img src="{!! asset('/storage/images/shows.jpg') !!}" alt="https://unsplash.com/@anthonydelanoix">
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
                                <div class="artist_sig"><img src="{!! asset('/storage/images/sig.png') !!}" alt=""></div>
                                <div class="single_player_container d-flex flex-column align-items-start justify-content-center">
                                    <div class="single_player">
                                        <div id="jplayer_2" class="jp-jplayer"></div>
                                        <div id="jp_container_2" class="jp-audio" role="application" aria-label="media player">
                                            <div class="jp-type-single">
                                                <div class="player_details d-flex flex-row align-items-center justify-content-start">
                                                    <div class="jp-details">
                                                        <div>playing</div>
                                                        <div class="jp-title" aria-label="title">&nbsp;</div>
                                                    </div>
                                                    <div class="jp-controls-holder ml-auto">
                                                        <button class="jp-play" tabindex="0"></button>
                                                    </div>
                                                </div>
                                                <div class="player_controls">
                                                    <div class="jp-gui jp-interface d-flex flex-row align-items-center justify-content-start">
                                                        <div class="jp-controls-holder time_controls d-flex flex-row align-items-center justify-content-start">
                                                            <div><div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div></div>
                                                            <div class="jp-progress">
                                                                <div class="jp-seek-bar">
                                                                    <div class="jp-play-bar"></div>
                                                                </div>
                                                            </div>
                                                            <div><div class="jp-duration ml-auto" role="timer" aria-label="duration">&nbsp;</div></div>
                                                        </div>
                                                        <div class="jp-volume-controls d-flex flex-row align-items-center justify-content-start ml-auto">
                                                            <button class="jp-mute" tabindex="0"></button>
                                                            <div class="jp-volume-bar">
                                                                <div class="jp-volume-bar-value"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jp-no-solution">
                                                    <span>Update Required</span>
                                                    To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
