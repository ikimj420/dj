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
                    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('/storage/images/blog.jpg') !!}" data-speed="0.8"></div>
                    <div class="home_container">
                        <div class="home_content text-center">
                            <div class="home_subtitle">Just me</div>
                            <div class="home_title">The Blog</div>
                        </div>
                    </div>
                </div>
            </div>

            @auth
                @if(Auth::user()->isAdmin === 1)
                    <div class="container">
                        <div class="row">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#add">Add New News</button>
                        </div>
                    </div>
                @endif
            @endauth
            <!-- Modal -->
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewLabel">Add New News</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="/blog" id="addNew" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="text" name="title" placeholder="Title" class="form-control">
                            </div>

                            <div class="form-group">
                                    <textarea name="body" placeholder="Body" class="form-control">
                                    </textarea>
                            </div>

                            <div class="form-group">
                                <input type="text" name="video" placeholder="Video" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="text" name="dj" placeholder="Dj" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="text" name="tags" placeholder="Tags" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="file" name="pics" placeholder="Image" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa fa-window-close"></i></button>
                            <button type="submit" class="btn btn-primary">Create <i class="fa fa-save"></i></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        @include('include.flash-message')

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
                                            <div class="blog_post_image"><img src="{!! asset('/storage/blog/'.$blog->pics) !!}" alt="https://unsplash.com/@stevenerixon"></div>
                                            <div class="blog_post_title"><h2><a href="/blog/{!! $blog->id !!}">{!! $blog->title !!}</a></h2></div>
                                            <div class="blog_post_info">
                                                <ul class="d-flex flex-row align-items-start justify-content-start">
                                                    <li>by {!! $blog->user->name !!}</li>
                                                    <li><a href="#">2 Comments</a></li>
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
                                            <div class="latest_news_image"><img src="{!! asset('/storage/blog/'.$blog->pics) !!}" alt="https://unsplash.com/@dannykekspro"></div>
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
