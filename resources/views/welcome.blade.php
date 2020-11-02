@extends('layouts.app')

@section('content')

    <cover img="{{ asset('images/cover.jpg') }}">
        <div class="text-center h-100 d-flex flex-column justify-content-center">
            <div>
                <img src="{{ asset('images/logo_big_no_bg.png') }}">
                <br />

                <a href="{{ route('hours') }}" class="btn btn-secondary btn-lg mt-5">Zobacz godziny otwarcia {{ App::getLocale() }}</a>
            </div>
        </div>
    </cover>

@endsection
