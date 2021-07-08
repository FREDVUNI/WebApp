<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Backlink | @yield("title")
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('svg/logo.svg') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="{{ asset('svg/logo.svg') }}" alt="logo" class="rounded-circle w-50" style="max-width:80px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link calltoaction" href="{{ route('domain.create') }}">Submit your form</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 

        <main class="pt-5">
            @yield('content')
        <footer id="footer-fixed" class="footer black-bg">
            <div class="page-section-pt">
                <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 sm-mb-30">
                        <div class="footer-logo">
                            <img id="logo-footer" class="mb-3" src="/svg/logo.svg" alt="">
                            <p class="pb-10"> Link building is one of the most important thing in SEO! <br/>
                            Every Little helps, Submit your domain and get a do follow backlink from our website</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 sm-mb-30">
                        <div class="footer-useful-link footer-hedding">
                            <h6 class=" pb-3 text-white text-uppercase">Links</h6>
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('domain.create') }}">Submit your domain</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 xs-mb-30">
                        <div class="footer-useful-link footer-hedding">
                            <h6 class="text-white pb-3 text-uppercase">socials</h6>
                            <ul>
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">LinkedIn</a></li>
                                <li><a href="#">Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </footer>
        </main>
    </div>
</body>
</html>
