@extends('layouts.app')

@section('content')

    <cover img="{{ asset('images/moon.jpg') }}">
        <div class="text-center h-100 d-flex flex-column justify-content-center">
            <div>
                <img src="{{ asset('images/logo_big_no_bg.png') }}">
                <br/>
                <div class="subtitle mt-3 text-white">Astronomia dla osób w każdym wieku</div>

                <a href="{{ route('hours') }}" class="btn btn-astro btn-lg mt-5">Zobacz godziny
                    otwarcia {{ App::getLocale() }}</a>
            </div>
        </div>
    </cover>

    <section>
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="p-5">
                    <h2 class="sub-gradient">Co to jest astrobaza?</h2>
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pulvinar euismod
                        amet duis et venenatis.
                        Amet, nunc placerat eget diam pellentesque lacus. Pulvinar eget at bibendum ornare nisi nunc.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pulvinar euismod amet duis et
                        venenatis. Amet, nunc placerat eget diam pellentesque lacus. Pulvinar eget at bibendum ornare
                        nisi nunc.</p>
                </div>

                <img class="w-50" src="{{ asset('images/view.jpg') }}"/>

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
                        <img src="{{ asset('images/planeta.svg') }}">
                        <p class="mt-3 font-weight-bold">{{ _("Obserwacja gwiazd, planet i Słońca pod okiem edukatora") }}</p>
                    </div>
                </div>
                <div class="col p-1">
                    <div
                        class="bg-light-blue p-3 text-center h-100 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('images/prezentacja.svg') }}">
                        <p class="mt-3 font-weight-bold">{{ _("Porady i prezentacje dotyczące sprzętu astronomicznego") }}</p>
                    </div>
                </div>
                <div class="col p-1">
                    <div
                        class="bg-light-blue p-3 text-center h-100 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('images/teleskop.svg') }}">
                        <p class="mt-3 font-weight-bold">{{ _("Praktyczna nauka obsługi sprzętu astronomicznego") }}</p>
                    </div>
                </div>
                <div class="col p-1">
                    <div
                        class="bg-light-blue p-3 text-center h-100 d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('images/rozmowa.svg') }}">
                        <p class="mt-3 font-weight-bold">{{ _("Ciekawostki astronomiczne, pogadanki i prezentacja zdjęć") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2 class="sub-gradient">Najnowsze zdjęcia</h2>
            <gallery id="1"></gallery>
            <gallery id="2"></gallery>
        </div>
    </section>

@endsection
