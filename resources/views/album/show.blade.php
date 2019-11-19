<!DOCTYPE html>
<html lang="en">
<head>
    <title>Album</title>
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
    <div class="home container-fluid">
        <div class="home_slider_container">
            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">
                @forelse($images as $image)
                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-image:url({!! asset('/storage/image/large/'.$image->pics) !!})"></div>
                    <div class="home_container">
                        <div class="home_container_inner d-flex flex-column align-items-center justify-content-center">
                            <div class="home_content text-center">
                                <div class="home_subtitle">{!! $image->title !!}</div>
                                <div class="home_subtitle">{!! $image->date !!}</div>
                                <div class="home_subtitle">{!! $image->desc !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
                    @empty
                @endforelse
            </div>
        </div>
    </div>

    <div class="shows">
        <div class="container-fluid">
            @include('include.flash-message')
            <div class="col-sm-2 float-left">
                @include('album.include.update')
            </div>
            <div class="col-sm-2 float-left">
                @include('image.include.add')
            </div>
            <div class="col-sm-2 float-right">
                @include('album.include.delete')
            </div>
        </div>
    </div>

    <div class="clear"></div>

    <!-- Album Image -->
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <div class="section_title_container">
                    <div class="section_subtitle">
                        @auth
                            @if(Auth::user()->isAdmin === 1)
                                <div class="col-sm-4 mb-5">
                                    <div class="img-fluid">
                                        <img src="{!! asset('/storage/album/thumbnail/'.$album->pics) !!}" alt="">
                                    </div>
                                </div>
                            @endif
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Title -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container">
                    <div class="section_subtitle">
                        @auth
                            @if(Auth::user()->isAdmin === 1)
                                @foreach($images as $image)
                                    <h3>
                                        <a href="/image/{!! $image->id !!}">{!! $image->title !!}</a>
                                    </h3>
                                @endforeach
                            @endif
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tags -->
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <div class="section_title_container">
                    <div class="section_subtitle">
                        <ul>
                            <li><span>Tags: </span>
                                @forelse($album->tags as $tag)
                                    <a href="/tag/tags/{{ $tag }}"> <span>#{!! $tag->normalized !!}</span></a>
                                @empty
                                    <span> Noting To Show</span>
                                @endforelse
                            </li>
                        </ul>
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

