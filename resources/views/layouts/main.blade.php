<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Index</title>
    <!--[if lt IE 9]><script src="{{ asset('js/html5shiv.min.js') }}"></script><![endif]-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link href="{{ asset('webfonts/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stellarnav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/apple-touch-icon-144-precomposed.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

    @stack('styles')
</head>

<body>
<div class="site">
    <div class="site-content">

        <header class="header">
            <div class="container clearfix">
                <nav class="stellarnav">
                    <ul>
                        <li><a href="{{ route('how-it-works') }}">How it Works</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                    </ul>
                </nav>

                <ul class="action">
                    @guest
                        <li><a href="{{ route('login') }}">LOGIN</a></li>
                        <li><a href="{{ route('register') }}">REGISTER</a></li>
                    @endguest

                    @auth
                        <li class="dark-btn"><a href="{{ route('dashboard') }}">DASHBOARD</a></li>
                    @endauth
                </ul>
            </div>
        </header>

        @yield('content')
    </div>

    <footer class="footer">
        <div class="container clearfix">
            <div class="float-left">All rights reserved © 2020</div>
            <div class="float-right"><a href="{{ route('terms') }}"> Terms & Conditions</a></div>
        </div>
    </footer>
</div>

<!-- Bootstrap core JavaScript================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery-min.js') }}" ></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
<script src="{{ asset('js/ie-emulation-modes-warning.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/stellarnav.js') }}"></script>
<script src="{{ asset('js/jquery.matchHeight-min.js') }}"></script>
<script type="text/javascript">
    jQuery('.coleql_height').matchHeight();
    jQuery(document).ready(function($) {
        jQuery('.stellarnav').stellarNav({
            theme: 'light',
            breakpoint: 767,
            position: 'right',
        });
    });
</script>

@stack('scripts')

</body>
</html>