<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Astrobaza Świecie') | Astrobaza Świecie</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- BEGIN callpage.io widget -->
    <!-- IMPORTANT: Remove script below if you don't need support for older browsers. -->
{{--    <script>(function () {var script = document.createElement('script');script.src = 'https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js';script.async = false;document.head.appendChild(script);}())</script><script>var __cp = {"id":"qA8U9a6Iv6W07L2zegv3kqSROMUdDcoZk4qCcKkuEsU","version":"1.1"};(function (window, document) {var cp = document.createElement('script');cp.type = 'text/javascript';cp.async = false;cp.src = "++cdn-widget.callpage.io+build+js+callpage.js".replace(/[+]/g, '/').replace(/[=]/g, '.');var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(cp, s);if (window.callpage) {alert('You could have only 1 CallPage code on your website!');} else {window.callpage = function (method) {if (method == '__getQueue') {return this.methods;}else if (method) {if (typeof window.callpage.execute === 'function') {return window.callpage.execute.apply(this, arguments);}else {(this.methods = this.methods || []).push({arguments: arguments});}}};window.callpage.__cp = __cp;window.callpage('api.button.autoshow');}})(window, document);</script>--}}
    <!-- END callpage.io widget -->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MHTZKJP');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MHTZKJP"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header>
    <div class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top nav-transparent" id="nav">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo_cb.png') }}" height="40"
                     alt="Main navbar logo"> {{ __("ASTROBAZA ŚWIECIE") }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="mr-auto"></div>
                <ul class="navbar-nav">
                    <li class="nav-item px-2 active">
                        <a class="nav-link" href="{{ url('/') }}">{{ __("Strona główna") }} <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ url('galeria') }}">{{ __("Galeria") }}</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ url('kontakt') }}">{{ __("Kontakt") }}</a>
                    </li>
                </ul>
                <div>
                    @auth()
                        <div class="d-inline-block">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn btn-sm btn-outline-secondary mr-3">Wyloguj</button>
                            </form>
                        </div>
                    @endauth

                    @if(App::isLocale('pl'))
                        <a href="{{ route('locale', 'en') }}">
                            <img alt="lang-en" src="{{ asset('images/en.png') }}" height="20">
                        </a>
                    @else
                        <a href="{{ route('locale', 'pl') }}">
                            <img alt="lang-pl" src="{{ asset('images/pl.png') }}" height="20">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<main role="main" id="app">
    <h1 class="hide">@yield('title')</h1>

    @yield('content')

</main>

<section class="text-center bg-moon p-lg-5 p-md-3 p-sm-3 p-2">
    <h2>{{ __("Zapraszamy do odwiedzin") }}</h2>
    <p class="font-weight-bold">{{ __("Odwiedziny w Astrobazie są całkowicie darmowe!") }}</p>
    @if(!Request::is('kontakt'))
        <a href="{{ route('contact') }}" class="btn btn-astro">{{ __("Zobacz godziny otwarcia") }}</a>
    @endif
</section>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">{{ __("Wróć na górę") }}</a>
        </p>
        <p>&copy; <a href="https://gackowski.edu.pl" target="_blank">dr inż. Szymon Gackowski</a> dla Astrobazy Świecie
        </p>
    </div>
</footer>

</body>
</body>
</html>
