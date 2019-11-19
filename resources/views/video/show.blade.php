<!DOCTYPE html>
<html lang="en">
<head>
    <title>Video</title>
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
            <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('/storage/images/player.svg') !!}" data-speed="0.8"></div>
            <div class="home_container">
                <div class="home_content text-center">
                    <div class="home_subtitle"></div>
                    <div class="home_title">{!! $video->title !!}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="single">
        <div class="container-fluid">
            @include('include.flash-message')
            <div class="col-sm-2 float-left">
                @include('video.include.update')
            </div>
            <div class="col-sm-2 float-right">
                @include('video.include.delete')
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
                        <div class="single_image"><img src="{!! asset('/storage/images/blog_1.jpg') !!}" alt=""></div>
                        <div class="single_info_list">
                            <ul>
                                <li><span>Title: </span>{!! $video->title !!}</li>
                                <li><span>Release date: </span>{!! $video->date !!}</li>
                                <li><span>Tags: </span>
                                    @forelse($video->tags as $tag)
                                        <a href="/tag/tags/{{ $tag }}"> <span>#{!! $tag->normalized !!}</span></a>
                                    @empty
                                        <span> Noting To Show</span>
                                    @endforelse
                                </li>
                                <li><span>Producer: </span>{!! $video->producer !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Content -->
                <div class="col-lg-7 single_content_col">
                    <div class="single_content">
                        <div class="single_text">
                            <p>
                                {!! $video->desc !!}
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
                        <iframe width="560" height="315" src="{!! $video->video !!}?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video">
        <div class="container">
            @comments([
            'model' => $video,
            'approved' => true
            ])
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
