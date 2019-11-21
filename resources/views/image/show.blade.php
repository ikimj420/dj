<!DOCTYPE html>
<html lang="en">
<head>
    <title>Image</title>
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
    <div class="container" style="margin-top: 102px;">
        <div class="row">
            <div class="img-fluid">
                <img src="{!! asset('/storage/image/thumbnail/'.$image->pics) !!}" alt="{!! $image->pics !!}">
                <p>
                    {!! $image->title !!}
                </p>
            </div>
        </div>
    </div>


    <div class="shows">
        <div class="container-fluid">
            @include('include.flash-message')
            <div class="col-sm-2 float-left">
                @include('image.include.update')
            </div>
            <div class="col-sm-2 float-right">
                @include('image.include.delete')
            </div>
        </div>
    </div>

    <div class="clear"></div>

    <!-- Footer -->
    @include('include.footer')

</div>

@include('include.js')
<script src="{!! asset('js/custom.js') !!}"></script>
</body>
</html>


