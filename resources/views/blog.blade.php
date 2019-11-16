<!DOCTYPE html>
<html lang="en">
    <head>
        <title>News</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Dj">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('include.css')
        <link rel="stylesheet" type="text/css" href="{!! asset('styles/blog.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('styles/blog_responsive.css') !!}">

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
                    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/blog.jpg" data-speed="0.8"></div>
                    <div class="home_container">
                        <div class="home_content text-center">
                            <div class="home_subtitle">Just me</div>
                            <div class="home_title">The Blog</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog -->
            <div class="blog">
                <div class="container">
                    <div class="row">
                        <!-- Blog Posts -->
                        <div class="col-lg-9">
                            <div class="blog_posts">
                                <!-- Blog Post -->
                                <div class="blog_post">
                                    <div class="blog_post_date d-flex flex-column align-items-center justify-content-center">
                                        <div>July</div>
                                        <div>26</div>
                                        <div>2018</div>
                                    </div>
                                    <div class="blog_post_image"><img src="images/blog_1.jpg" alt="https://unsplash.com/@stevenerixon"></div>
                                    <div class="blog_post_title"><h2><a href="#">How to get the best playlist</a></h2></div>
                                    <div class="blog_post_info">
                                        <ul class="d-flex flex-row align-items-start justify-content-start">
                                            <li>by <a href="#">Admin</a></li>
                                            <li><a href="#">2 Comments</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog_post_text">
                                        <p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus luctus nec. Curabitur luctus luctus erat, sit amet facilisis quam congue quis. Quisque ornare luctus erat id dignissim. Nullam ac nunc quis ex porttitor luctus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="load_more">
                                <div class="button"><a href="#">Load More</a></div>
                            </div>
                        </div>
                        <!-- Sidebar -->
                        <div class="col-lg-3">
                            <div class="sidebar">
                                <div class="sidebar_section">
                                    <div class="sidebar_title">Latest News</div>
                                    <div class="latest_news_list">
                                        <!-- Latest News -->
                                        <div class="latest_news d-flex flex-row align-items-start justify-content-start">
                                            <div class="latest_news_image"><img src="images/latest_1.jpg" alt="https://unsplash.com/@dannykekspro"></div>
                                            <div class="latest_news_content">
                                                <div class="latest_news_date"><a href="#">July 26, 2018</a></div>
                                                <div class="latest_news_title"><a href="#">How to get the best playlist</a></div>
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
            <script src="{!! asset('js/blog.js') !!}"></script>
    </body>
</html>
