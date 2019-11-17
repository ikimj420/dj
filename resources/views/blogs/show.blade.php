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
                    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('/storage/images/single.jpg') !!}" data-speed="0.8"></div>
                    <div class="home_container">
                        <div class="home_content text-center">
                            <div class="home_subtitle">Just me</div>
                            <div class="home_title">The Single</div>
                        </div>
                    </div>
                </div>
            </div>

            @auth
                @if(Auth::user()->isAdmin === 1)
                    <form action="/blog/{!! $blog->id !!}" method="post" onclick="return confirm('Are you sure?')">
                        @method("DELETE")
                        @csrf
                        <div class="container">
                            <div class="row">
                                <button class="btn btn-danger" type="submit"> Delete </button>
                            </div>
                        </div>
                    </form>

                    <div class="container">
                        <div class="row">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#update">Update News</button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateLabel">Update News</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="/blog/{!! $blog->id !!}" id="update" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <input type="text" value="{!! $blog->title !!}" name="title" placeholder="Title" class="form-control">
                                        </div>

                                        <div class="form-group">
                                    <textarea name="body" placeholder="Body" class="form-control">
                                        {!! $blog->body !!}
                                    </textarea>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" value="{!! $blog->video !!}" name="video" placeholder="Video" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" value="{!! $blog->dj !!}" name="dj" placeholder="Dj" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" value="{!! $blog->tagList !!}" name="tags" placeholder="Tags" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="file" name="pics" placeholder="Image" class="form-control">
                                            @if(!empty($blog))
                                                <img src="/storage/blog/{!! $blog->pics !!}" style="width: 10%" alt="{!! $blog->title !!}">
                                            @endif
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa fa-window-close"></i></button>
                                        <button type="submit" class="btn btn-primary">Update <i class="fa fa-save"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                @endif
            @endauth

            @include('include.flash-message')

            <!-- Single -->
            <div class="single">
                <div class="container">
                    <div class="row">
                        <!-- Single Info -->
                        <div class="col-lg-5">
                            <div class="single_info">
                                <div class="single_image"><img src="{!! asset('/storage/blog/'.$blog->pics) !!}" alt=""></div>
                                <div class="single_info_list">
                                    <ul>
                                        <li><span>Release date: </span>{!! $blog->created_at->diffForHumans() !!}</li>
                                        <li><span>Tags: </span>
                                            @forelse($blog->tags as $tag)
                                                <a href="/tag/tags/{{ $tag }}"> <span>#{!! $tag->normalized !!}</span></a>
                                            @empty
                                                <span> Noting To Show</span>
                                            @endforelse
                                        </li>
                                        <li><span>Producer: </span>{!! $blog->dj !!}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Content -->
                        <div class="col-lg-7 single_content_col">
                            <div class="single_content">
                                <div class="single_text">
                                    <p>
                                        {!! $blog->body !!}
                                    </p>
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
                                <iframe width="560" height="315" src="{!! $blog->video !!}?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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

