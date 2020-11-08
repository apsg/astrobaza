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
</head>
<body>
<body>
<header>
    <div class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top nav-transparent" id="nav">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo_cb.png') }}" height="40"> {{ __("ASTROBAZA ŚWIECIE") }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">{{ __("Strona główna") }} <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('galeria') }}">{{ __("Galeria") }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('kontakt') }}">{{ __("Kontakt") }}</a>
                    </li>
                </ul>
                <div>
                    @if(App::isLocale('pl'))
                        <a href="{{ route('locale', 'en') }}">
                            <img src="{{ asset('images/en.png') }}" height="20">
                        </a>
                    @else
                        <a href="{{ route('locale', 'pl') }}">
                            <img src="{{ asset('images/pl.png') }}" height="20">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<main role="main" id="app">

    @yield('content')

</main>

<section class="text-center bg-moon p-lg-5 p-md-3 p-sm-3">
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
        <p>&copy; <a href="https://gackowski.edu.pl" target="_blank">dr inż. Szymon Gackowski</a> dla Astrobazy Świecie</p>
    </div>
</footer>


</body>
</body>
</html>
