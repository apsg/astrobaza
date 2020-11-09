<?php
namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use App\Transformers\GalleryMediaTransformer;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function show(Gallery $gallery)
    {
        $images = fractal($gallery->getMedia('images'), new GalleryMediaTransformer())
            ->toArray()['data'];

        return compact('gallery', 'images');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return back();
    }

    public function store(GalleryRequest $request)
    {
        $gallery = Gallery::create($request->all());

        return response()->json(['id' => $gallery->id]);
    }

    public function update(Gallery $gallery, GalleryRequest $request)
    {
        $gallery->update($request->all());

        return response()->json(['id' => $gallery->id]);
    }

    public function uploadImages(Gallery $gallery, Request $request)
    {
        if ($request->file('file')->getError()) {
            return $request->file('file')->getErrorMessage();
        }

        $gallery->addMedia($request->file('file')->getRealPath())
            ->setFileName($request->file('file')->getClientOriginalName())
            ->toMediaCollection('images');

        return response("ok");
    }

    public function deleteImage(Gallery $gallery, string $uuid)
    {
        $gallery->media()->where('uuid', $uuid)->delete();

        return response("ok");
    }
}
