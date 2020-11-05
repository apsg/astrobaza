<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Transformers\GalleryMediaTransformer;

class GalleryController extends Controller
{
    public function show(Gallery $gallery)
    {
        $images = fractal($gallery->getMedia(), new GalleryMediaTransformer())
            ->toArray()['data'];

        return compact('gallery', 'images');
    }
}
