<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Dj">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('include.css')
        <link rel="stylesheet" type="text/css" href="{!! asset('styles/about.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('styles/about_responsive.css') !!}">

    </head>
    <body>

        <div class="super_container">

            <!-- Header -->
            @include('include.header')

            <!-- Menu -->
            @include('include.menu')

            <!-- Home -->
            <div class="home">
                <div class="home_inner">
                    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('/storage/images/about.svg') !!}" data-speed="0.8"></div>
                    <div class="home_container">
                        <div class="home_content text-center">
                            <div class="home_subtitle"></div>
                            <div class="home_title">About</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="discs">
                <div class="container-fluid">
                    @include('include.flash-message')
                    <div class="col-sm-3 float-left">
                        @include('users.include.update')
                    </div>
                    <div class="col-sm-3 float-left">
                        @include('video.include.add')
                    </div>
                    <div class="col-sm-3 float-left">
                        @include('album.include.add')
                    </div>
                </div>
            </div>

            <!-- Discs -->
            <div class="discs">
                <div class="container">
                    <div class="home_title mb-4">Video</div>
                    <div class="row discs_row">
                    @forelse($video as $v)
                        <!-- Disc -->
                            <div class="col-xl-4 col-md-6">
                                <div class="disc">
                                    <a href="/video/{!! $v->id !!}">
                                        <div class="disc_image"><img src="{!! asset('/storage/images/video.svg') !!}" alt=""></div>
                                        <div class="disc_container">
                                            <div>
                                                <div class="disc_content_6">
                                                    <div class="disc_title">{!! $v->title !!}</div>
                                                    <div class="disc_subtitle">Music For the People From Me</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="load_more">
                        <div>
                            {!! $video->links() !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Discs -->
            <div class="discs">
                <div class="container">
                    <div class="home_title mb-4">Photo Albums</div>
                    <div class="row discs_row">
                    @forelse($albums as $album)
                        <!-- Disc -->
                            <div class="col-xl-4 col-md-6">
                                <div class="disc">
                                    <a href="/album/{!! $album->id !!}">
                                        <div class="disc_image"><img src="{!! asset('/storage/album/thumbnail/'.$album->pics) !!}" alt=""></div>
                                        <div class="disc_container">
                                            <div>
                                                <div class="disc_content_6">
                                                    <div class="disc_title">{!! $album->title !!}</div>
                                                    <div class="disc_subtitle"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="load_more">
                        <div>
                            {!! $albums->links() !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Artist -->
            <div class="artist">
                <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('/storage/images/music.svg') !!}" data-speed="0.8"></div>
                <div class="container">
                    <div class="row">
                        <!-- Artist Content -->
                        <div class="col-lg-7 offset-lg-5">
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

            <!-- Milestones -->
            <div class="milestones">
                <div class="milestones_container">
                    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('/storage/images/dawn.svg') !!}" data-speed="0.8"></div>
                    <div class="container">
                        <div class="row milestones_row">
                            <!-- Milestone -->
                            <div class="col-xl-3 col-md-6 milestone_col">
                                <div class="milestone d-flex flex-row align-items-center justify-content-start">
                                    <div class="milestone_icon"><img src="{!! asset('/storage/images/icon_1.svg') !!}" alt=""></div>
                                    <div class="milestone_content">
                                        <div class="milestone_counter" data-end-value="298" data-sign-after="k">0</div>
                                        <div class="milestone_text">Albums sold</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Milestone -->
                            <div class="col-xl-3 col-md-6 milestone_col">
                                <div class="milestone d-flex flex-row align-items-center justify-content-start">
                                    <div class="milestone_icon"><img src="{!! asset('/storage/images/icon_2.svg') !!}" alt=""></div>
                                    <div class="milestone_content">
                                        <div class="milestone_counter" data-end-value="183">0</div>
                                        <div class="milestone_text">Live Concerts</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Milestone -->
                            <div class="col-xl-3 col-md-6 milestone_col">
                                <div class="milestone d-flex flex-row align-items-center justify-content-start">
                                    <div class="milestone_icon"><img src="{!! asset('/storage/images/icon_3.svg') !!}" alt=""></div>
                                    <div class="milestone_content">
                                        <div class="milestone_counter" data-end-value="37">0</div>
                                        <div class="milestone_text">Awards won</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Milestone -->
                            <div class="col-xl-3 col-md-6 milestone_col">
                                <div class="milestone d-flex flex-row align-items-center justify-content-start">
                                    <div class="milestone_icon"><img src="{!! asset('/storage/images/icon_4.svg') !!}" alt=""></div>
                                    <div class="milestone_content">
                                        <div class="milestone_counter" data-end-value="14">0</div>
                                        <div class="milestone_text">New Singles</div>
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
            <script src="{!! asset('js/about.js') !!}"></script>
    </body>
</html>
