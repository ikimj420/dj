<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tags</title>
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
            <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('/storage/images/tags.svg') !!}" data-speed="0.8"></div>
            <div class="home_container">
                <div class="home_content text-center">
                    <div class="home_subtitle"></div>
                    <div class="home_title">Tags</div>
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
                        @endforelse
                    @endif
                    @if(!empty($videos))
                        @forelse($videos as $video)
                            <div class="blog_posts">
                                <!-- Blog Post -->
                                <div class="blog_post">
                                    <div class="blog_post_date d-flex flex-column align-items-center justify-content-center">
                                        <div>{{ \Carbon\Carbon::parse($video->date)->format('M')}}</div>
                                        <div>{{ \Carbon\Carbon::parse($video->date)->format('d')}}</div>
                                        <div>{{ \Carbon\Carbon::parse($video->date)->format('Y')}}</div>
                                    </div>
                                    <a href="/video/{!! $video->id !!}"><div class="blog_post_image"><img src="{!! asset('/storage/images/video.svg') !!}" style="width: 500px;" alt=""></div></a>
                                    <div class="blog_post_title"><h2><a href="/video/{!! $video->id !!}">{!! $video->title !!}</a></h2></div>
                                    <div class="blog_post_info">
                                        <ul class="d-flex flex-row align-items-start justify-content-start">
                                            <li>by {!! $video->user->name !!}</li>
                                            <li><a href="/video/{!! $video->id !!}">{!! $video->comments->count() !!} Comments</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog_post_text">
                                        <p>
                                            {!! Str::words($video->desc, 10, ' >>>') !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    @endif
                    @if(!empty($albums))
                            @forelse($albums as $album)
                                <div class="blog_posts">
                                    <!-- Blog Post -->
                                    <div class="blog_post">
                                        <div class="blog_post_date d-flex flex-column align-items-center justify-content-center">
                                            <div>{{ \Carbon\Carbon::parse($album->date)->format('M')}}</div>
                                            <div>{{ \Carbon\Carbon::parse($album->date)->format('d')}}</div>
                                            <div>{{ \Carbon\Carbon::parse($album->date)->format('Y')}}</div>
                                        </div>
                                        <a href="/album/{!! $album->id !!}"><div class="blog_post_image"><img src="{!! asset('/storage/album/'.$album->pics) !!}" alt=""></div></a>
                                        <div class="blog_post_title"><h2><a href="/album/{!! $album->id !!}">{!! $album->title !!}</a></h2></div>
                                        <div class="blog_post_info">
                                            <ul class="d-flex flex-row align-items-start justify-content-start">
                                                <li>by </li>
                                                <li><a href="/album/{!! $album->id !!}">{!! $album->comments->count() !!} Comments</a></li>
                                            </ul>
                                        </div>
                                        <div class="blog_post_text">
                                            <p>
                                                {!! Str::words($album->desc, 10, ' >>>') !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Tags</div>
                            <div class="latest_news_list">
                            @forelse($blogs as $blog)
                                <!-- Latest News -->
                                    <div class="latest_news d-flex flex-row align-items-start justify-content-start">
                                        <a href="/blog/{!! $blog->id !!}"><div class="latest_news_image"><img src="{!! asset('/storage/blog/thumbnail/'.$blog->pics) !!}" alt=""></div></a>
                                        <div class="latest_news_content">
                                            <div class="latest_news_title"><a href="/blog/{!! $blog->id !!}">{!! $blog->title !!}</a></div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                @forelse($videos as $video)
                                <!-- Latest News -->
                                    <div class="latest_news d-flex flex-row align-items-start justify-content-start">
                                        <a href="/video/{!! $video->id !!}"><div class="latest_news_image"><img src="{!! asset('/storage/images/video.svg') !!}" alt="" style="width: 55px; height: 55px;"></div></a>
                                        <div class="latest_news_content">
                                            <div class="latest_news_title"><a href="/blog/{!! $video->id !!}">{!! $video->title !!}</a></div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                @forelse($albums as $album)
                                <!-- Latest News -->
                                    <div class="latest_news d-flex flex-row align-items-start justify-content-start">
                                        <a href="/album/{!! $album->id !!}"><div class="latest_news_image"><img src="{!! asset('/storage/album/thumbnail/'.$album->pics) !!}" alt=""></div></a>
                                        <div class="latest_news_content">
                                            <div class="latest_news_title"><a href="/blog/{!! $album->id !!}">{!! $album->title !!}</a></div>
                                        </div>
                                    </div>
                                @empty
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

