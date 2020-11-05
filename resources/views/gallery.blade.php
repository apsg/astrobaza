@extends('layouts.app')

@section('title', __("Galeria"))

@section('content')
    <div class="container pt-nav">
        <h1>Galerie</h1>

        @foreach($galleries as $gallery)
            <gallery id="{{$gallery->id}}"></gallery>
        @endforeach
    </div>
@endsection
