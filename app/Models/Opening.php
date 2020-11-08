<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

/**
 * @property int    id
 * @property Carbon date
 * @property string from
 * @property string to
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Opening extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'from',
        'to',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    protected $appends = [
        'date_formatted',
        'day',
    ];

    public function scopeFuture($query)
    {
        $query->where('date', '>=', Carbon::today());
    }

    public function getDateFormattedAttribute()
    {
        return $this->date->format('Y-m-d');
    }

    public function getFromAttribute()
    {
        return substr($this->attributes['from'], 0, -3);
    }

    public function getToAttribute()
    {
        return substr($this->attributes['to'], 0, -3);
    }

    public function getDayAttribute()
    {
        return $this->date->locale(App::getLocale())->dayName;
    }
}
