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
                    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('/storage/images/blog.svg') !!}" data-speed="0.8"></div>
                    <div class="home_container">
                        <div class="home_content text-center">
                            <div class="home_subtitle"></div>
                            <div class="home_title">Blog</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="blog mb-3">
                <div class="container-fluid">
                    @include('include.flash-message')
                    <div class="col-sm-2 float-left">
                        @include('blogs.include.add')
                    </div>
                </div>
            </div>

            <!-- Blog -->
            <div class="blog">
                <div class="container">
                    <div class="row">
                        <!-- Blog Posts -->
                        <div class="col-lg-9">
                            @if(!empty($blogs))
                                @forelse($blogs as $blog)
                                    <div class="blog_posts">
                                        <!-- Blog Post -->
                                        <div class="blog_post">
                                            <div class="blog_post_date d-flex flex-column align-items-center justify-content-center">
                                                <div>{!! $blog->created_at->monthName !!}</div>
                                                <div>{!! $blog->created_at->day !!}</div>
                                                <div>{!! $blog->created_at->year !!}</div>
                                            </div>
                                            <a href="/blog/{!! $blog->id !!}"><div class="blog_post_image"><img src="{!! asset('/storage/blog/'.$blog->pics) !!}" alt=""></div></a>
                                            <div class="blog_post_title"><h2><a href="/blog/{!! $blog->id !!}">{!! $blog->title !!}</a></h2></div>
                                            <div class="blog_post_info">
                                                <ul class="d-flex flex-row align-items-start justify-content-start">
                                                    <li>by {!! $blog->user->name !!}</li>
                                                    <li><a href="/blog/{!! $blog->id !!}">{!! $blog->comments->count() !!} Comments</a></li>
                                                </ul>
                                            </div>
                                            <div class="blog_post_text">
                                                <p>
                                                    {!! Str::words($blog->body, 10, ' >>>') !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>Noting To Show</p>
                                @endforelse
                            @endif
                            <div class="load_more">
                                <div>
                                    {!! $blogs->links() !!}
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar -->
                        <div class="col-lg-3">
                            <div class="sidebar">
                                <div class="sidebar_section">
                                    <div class="sidebar_title">Latest News</div>
                                    <div class="latest_news_list">
                                        @forelse($blogs as $blog)
                                        <!-- Latest News -->
                                        <div class="latest_news d-flex flex-row align-items-start justify-content-start">
                                            <a href="/blog/{!! $blog->id !!}"><div class="latest_news_image"><img src="{!! asset('/storage/blog/thumbnail/'.$blog->pics) !!}" alt=""></div></a>
                                            <div class="latest_news_content">
                                                <div class="latest_news_date">{!! $blog->created_at->diffForHumans() !!}</div>
                                                <div class="latest_news_title"><a href="/blog/{!! $blog->id !!}">{!! $blog->title !!}</a></div>
                                            </div>
                                        </div>
                                        @empty
                                            <p>Noting To Show</p>
                                        @endforelse
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
