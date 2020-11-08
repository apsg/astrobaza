@extends('layouts.app')

@section('title', __("Kontakt"))

@section('content')
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 p-3">
                    <div class=" alert alert-warning">
                        <i class="fa fa-info-circle mr-3"></i> {{ __('messages.covid') }}
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="p-5 bg-light-blue">
                        <h2 class="sub-gradient">{{ __("Odwiedź Astrobazę w Świeciu") }}</h2>
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <i class="fa fa-2x fa-map-marker-alt"></i>
                            </div>
                            <div class="col py-3">
                                Zlokalizowane na terenie<br/>
                                I Liceum Ogólnokształcace im. Floriana Ceynowy.<br/>
                                ul. Gimnazjalna 3, 86-100 Świecie
                            </div>
                            <div class="col-12">
                                <hr class="border-white"/>
                            </div>
                            <div class="col-3 text-center">
                                <i class="fa fa-2x fa-mobile-alt"></i>
                            </div>
                            <div class="col py-3">
                                728 831 441
                            </div>
                            <div class="col-12">
                                <hr class="border-white"/>
                            </div>
                            <div class="col-3 text-center">
                                <i class="fa fa-2x fa-envelope"></i>
                            </div>
                            <div class="col py-3">
                                <a class="text-white"
                                   href="mailto:kontakt@astrobaza-swiecie.pl">kontakt@astrobaza-swiecie.pl</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mt-sm-2 mt-md-0">
                    <div class="p-5 bg-light-blue w-100">
                        <h2 class="sub-gradient mb-5">{{ __("Aktualne dni i godziny otwarcia") }}</h2>
                        <openings :openings="{{ $openings }}"></openings>
                            <x-add-opening/>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
{{--                    <iframe--}}
{{--                        class="w-100"--}}
{{--                        height="450"--}}
{{--                        frameborder="0" style="border:0"--}}
{{--                        src="https://www.google.com/maps/embed/v1/place?key={{ env('GOOGLE_API_KEY') }}--}}
{{--                            &q=Astrobaza Świecie" allowfullscreen>--}}
{{--                    </iframe>--}}
                </div>
            </div>
        </div>
    </section>
@endsection
