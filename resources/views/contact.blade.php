@extends('layouts.app')

@section('title', __("Kontakt"))

@section('content')
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 p-3">
                    <div class=" alert alert-warning">
                        <i class="fa fa-info-circle mr-3"></i> Przypominamy o konieczności zasłaniania przez
                        odwiedzających
                        ust
                        i nosa
                        za pomocą maseczki lub przyłbicy
                        oraz dezynfekcję rąk. Limit osób odwiedzających astrobazę – 5.
                    </div>
                </div>
                <div class="pr-md-3 col-md-6 col-sm-12">
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
                <div class="col-md-6 col-sm-12">
                    <div class="p-5 bg-light-blue w-100">
                        <h2 class="sub-gradient">{{ __("Aktualne dni i godziny otwarcia") }}</h2>
                        <openings :openings="{{ $openings }}"></openings>
                    </div>
                </div>
                <div class="col-md-12 bg-light-blue">

                </div>
            </div>
        </div>
    </section>
@endsection
