<footer class="footer">
    <div class="footer_container d-flex flex-xl-row flex-column align-items-start justify-content-start">
        <div class="newsletter_container">
        @if (Route::has('login'))
            <div class="container-fluid">
            @auth
                @else
                    @include('auth.include.login')
                @if (Route::has('register'))
                    @include('auth.include.register')
                @endif
            @endauth
            </div>
        @endif
        </div>
    </div>
    <div class="copyright_bar">
                <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    </span>
    </div>
</footer>
