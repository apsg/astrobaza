@extends('layouts.app')

@section('title', __("Galeria"))

@section('content')
    <div class="container pt-nav">
        <h1>Galerie</h1>

        @foreach($galleries as $gallery)
            <gallery :id="{{$gallery->id}}" :fancy="true"></gallery>
            @auth
                <div class="d-flex">
                    <button class="btn btn-primary mr-3" @click="editGallery({{ $gallery->id }})">
                        <i class="fa fa-edit"></i> Edytuj galerię
                    </button>
                    <form action="{{ route('gallery.delete', $gallery) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Usuń galerię</button>
                    </form>
                </div>
            @endauth
        @endforeach
    </div>

    @auth()
        <div class="container mt-3">
            <button type="button" class="btn btn-astro" data-toggle="modal" data-target="#galleryModal">
                <i class="fa fa-plus"></i> Dodaj galerię
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-black" id="galleryModalLabel">Edytuj galerię</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <edit-gallery ref="edit"></edit-gallery>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Zamknij
                        </button>
                        <button type="button" class="btn btn-primary">Zapisz</button>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
