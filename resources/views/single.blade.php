<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dj</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Dj">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('include.css')
        <link rel="stylesheet" type="text/css" href="{!! asset('styles/single.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('styles/single_responsive.css') !!}">

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
                    <!-- Image artist: https://unsplash.com/@yoannboyer -->
                    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/single.jpg" data-speed="0.8"></div>
                    <div class="home_container">
                        <div class="home_content text-center">
                            <div class="home_subtitle">Just me</div>
                            <div class="home_title">The Single</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single -->
            <div class="single">
                <div class="container">
                    <div class="row">
                        <!-- Single Info -->
                        <div class="col-lg-5">
                            <div class="single_info">
                                <div class="single_image"><img src="images/single_image.jpg" alt=""></div>
                                <div class="single_info_list">
                                    <ul>
                                        <li><span>Release date: </span>25 August, 2017</li>
                                        <li><span>Tags: </span>chill, techno, electronic</li>
                                        <li><span>Producers: </span>Michael Smith, Jenna Williams</li>
                                        <li><span>No of songs: </span>12</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Content -->
                        <div class="col-lg-7 single_content_col">
                            <div class="single_content">
                                <div class="single_text">
                                    <p> In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus luctus nec. Curabitur luctus luctus erat, sit amet facilisis quam congue quis. Quisque ornare luctus erat id dignissim. Nullam ac nunc quis ex porttitor luctus.</p>
                                    <p>Integer sed facilisis eros. In iaculis rhoncus velit in malesuada. In hac habitasse platea dictumst. Fusce erat ex, consectetur sit amet ornare suscipit, porta et erat. Donec nec nisi in nibh commodo laoreet. Mauris dapibus justo ut feugiat malesuada. Fusce ultricies ante tortor, non vestibulum est feugiat ut.</p>
                                    <p>Nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus luctus nec. Curabitur luctus luctus erat, sit amet facilisis quam congue quis. Quisque ornare luctus erat id dignissim. Nullam ac nunc quis ex porttitor luctus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video -->
            <div class="video">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="video_container">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/OsKLytDnKGA?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            @include('include.footer')

        </div>

            @include('include.js')
            <script src="{!! asset('plugins/jPlayer/jplayer.playlist.min.js') !!}"></script>
            <script src="{!! asset('plugins/fit-vids/jquery.fitvids.js') !!}"></script>
            <script src="{!! asset('js/single.js') !!}"></script>
    </body>
</html>

