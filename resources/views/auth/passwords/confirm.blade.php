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

<!-- Single -->
    <div class="single">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact_form_container">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
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
<script src="{!! asset('plugins/jPlayer/jplayer.playlist.min.js') !!}"></script>
<script src="{!! asset('plugins/fit-vids/jquery.fitvids.js') !!}"></script>
<script src="{!! asset('js/single.js') !!}"></script>
</body>
</html>
