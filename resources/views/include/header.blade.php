<header class="header">
    <div class="header_content d-flex flex-row align-items-center justify-content-center">
        <div class="logo"><a href="/">Dj</a></div>
        <div class="log_reg">
            @if (Route::has('login'))
                <ul class="d-flex flex-row align-items-start justify-content-start">
                    @auth
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout {!! Auth::user()->name !!}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"> @csrf </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                </ul>
            @endif
        </div>
        <nav class="main_nav">
            <ul class="d-flex flex-row align-items-start justify-content-start">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About Me</a></li>
                <li><a href="/blog">News</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
        <div class="hamburger ml-auto">
            <div class="d-flex flex-column align-items-end justify-content-between">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</header>
