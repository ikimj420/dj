<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dj</title>
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

    <div class="shows">
        <div class="container-fluid">
            <div class="home_title">
                <h3>
                    {!! $home->title !!}
                </h3>
            </div>

        </div>
    </div>

    <div class="shows">
        <div class="container-fluid">
            @include('include.flash-message')
            <div class="col-sm-2 float-left">
                @include('home.include.update')
            </div>
            <div class="col-sm-2 float-right">
                @include('home.include.delete')
            </div>
        </div>
    </div>

    <div class="clear"></div>

</div>

@include('include.js')
<script src="{!! asset('js/custom.js') !!}"></script>
</body>
</html>
