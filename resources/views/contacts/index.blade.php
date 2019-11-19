<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Dj">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('include.css')
        <link rel="stylesheet" type="text/css" href="{!! asset('styles/contact.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('styles/contact_responsive.css') !!}">

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
                    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{!! asset('/storage/images/contact.svg') !!}" data-speed="0.8"></div>
                    <div class="home_container">
                        <div class="home_content text-center">
                            <div class="home_subtitle"></div>
                            <div class="home_title">Contact</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact">
                <div class="container-fluid">
                    @include('include.flash-message')
                </div>
            </div>

            <!-- Contact -->
            <div class="contact">
                <div class="container">
                    <div class="row">
                        <!-- Contact Form -->
                        <div class="col-lg-6">
                            <div class="contact_form_container">
                                <div class="contact_title">Send me a message</div>
                                <form method="post" action="/contact" class="contact_form" id="contact_form">
                                    @csrf
                                    <input name="name" type="text" class="contact_input" placeholder="Name" required="required">
                                    <input name="email" type="email" class="contact_input" placeholder="E-mail" required="required">
                                    <textarea name="message" class="contact_input contact_textarea" placeholder="Message" required="required"></textarea>
                                    <button type="submit" class="contact_button">Send Message</button>
                                </form>
                            </div>
                        </div>
                        <!-- Contact Info -->
                        <div class="col-lg-6 contact_col">
                            <div class="contact_info">
                                <div class="contact_title">Where to find me</div>
                                <div class="contact_text">
                                    <p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus luctus nec. Curabitur luctus luctus erat, sit amet facilisis quam congue quis. Quisque ornare luctus erat id dignissim. Nullam ac nunc quis ex porttitor luctus.</p>
                                </div>
                                <div class="contact_info_list">
                                    <ul>
                                        <li class="d-flex flex-row align-items-start justify-content-start">
                                            <div><div>Address</div></div>
                                            <div>{!! $user->address !!}</div>
                                        </li>
                                        <li class="d-flex flex-row align-items-start justify-content-start">
                                            <div><div>Phone</div></div>
                                            <div>{!! $user->phones !!}</div>
                                        </li>
                                        <li class="d-flex flex-row align-items-start justify-content-start">
                                            <div><div>E-mail</div></div>
                                            <div>{!! $user->email !!}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="social">
                                    <ul class="d-flex flex-row align-items-center justify-content-start">
                                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    </ul>
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
            <script src="{!! asset('js/contact.js') !!}"></script>
    </body>
</html>
