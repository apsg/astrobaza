<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int         id
 * @property string      title
 * @property string|null description
 * @property Carbon      created_at
 * @property Carbon      updated_at
 *
 * @property-read string date
 *
 * @method static Builder recent()
 */
class Gallery extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $appends = [
        'date',
    ];

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc')
            ->limit(2);
    }

    public function registerMediaConversions(Media $media = null) : void
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 523, 392);
        $this->addMediaConversion('full')
            ->width(2000)
            ->height(1600);
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }
}
