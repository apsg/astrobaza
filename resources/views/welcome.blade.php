@extends('layouts.app')

@section('content')

    <cover img="{{ asset('images/moon.jpg') }}">
        <div class="text-center h-100 d-flex flex-column justify-content-center">
            <div>
                <img src="{{ asset('images/logo_big_no_bg.png') }}">
                <br/>
                <div class="subtitle mt-3 text-white">{{ __("Astronomia dla osób w każdym wieku") }}</div>
                <a href="{{ route('contact') }}" class="btn btn-astro btn-lg mt-5">
                    {{ __("Zobacz godziny otwarcia") }}
                </a>
            </div>
        </div>
    </cover>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sub-gradient">{{ __("Co to jest astrobaza?") }}</h2>
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pulvinar euismod
                        amet duis et venenatis.
                        Amet, nunc placerat eget diam pellentesque lacus. Pulvinar eget at bibendum ornare nisi nunc.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pulvinar euismod amet duis et
                        venenatis. Amet, nunc placerat eget diam pellentesque lacus. Pulvinar eget at bibendum ornare
                        nisi nunc.</p>

                    <a href="https://kujawsko-pomorskie.travel/pl/astrobazy"
                       target="_blank"
                       class="btn btn-outline-astro">{{ __("Dowiedz się więcej o astrobazach") }}</a>
                </div>

                <div class="col">
                    <gradient class="w-100" :opacity="0.5">
                        <img class="w-100" src="{{ asset('images/view.jpg') }}"/>
                    </gradient>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2 class="sub-gradient">Odkrywaj</h2>
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-1 mt-5">
                <div class="col p-1">
                    <div
                        class="bg-light-blue p-3 text-center h-100 d-flex flex-column justify-content-center align-items-center">
                        <img class="mt-3" src="{{ asset('images/planeta.svg') }}">
                        <p class="mt-3 font-weight-bold">{{ __("Obserwacja gwiazd, planet i Słońca pod okiem edukatora") }}</p>
                    </div>
                </div>
                <div class="col p-1">
                    <div
                        class="bg-light-blue p-3 text-center h-100 d-flex flex-column justify-content-center align-items-center">
                        <img class="mt-3" src="{{ asset('images/prezentacja.svg') }}">
                        <p class="mt-3 font-weight-bold">{{ __("Porady i prezentacje dotyczące sprzętu astronomicznego") }}</p>
                    </div>
                </div>
                <div class="col p-1">
                    <div
                        class="bg-light-blue p-3 text-center h-100 d-flex flex-column justify-content-center align-items-center">
                        <img class="mt-3" src="{{ asset('images/teleskop.svg') }}">
                        <p class="mt-3 font-weight-bold">{{ __("Praktyczna nauka obsługi sprzętu astronomicznego") }}</p>
                    </div>
                </div>
                <div class="col p-1">
                    <div
                        class="bg-light-blue p-3 text-center h-100 d-flex flex-column justify-content-center align-items-center">
                        <img class="mt-3" src="{{ asset('images/rozmowa.svg') }}">
                        <p class="mt-3 font-weight-bold">{{ __("Ciekawostki astronomiczne, pogadanki i prezentacja zdjęć") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2 class="sub-gradient">{{ __("Najnowsze zdjęcia") }}</h2>
            @foreach($galleries as $gallery)
                <gallery :id="{{ $gallery->id }}"></gallery>
            @endforeach

            <div class="text-center my-5">
                <a href="{{ route('gallery') }}" class="btn btn-astro">
                    {{ __("Odwiedź galerię") }}
                </a>
            </div>
        </div>
    </section>

@endsection
