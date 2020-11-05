<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GalleryMediaTransformer extends TransformerAbstract
{
    public function transform(Media $media)
    {
        return [
            'thumb' => $media->getFullUrl('thumb'),
            'url'   => $media->getFullUrl(),
        ];
    }
}
