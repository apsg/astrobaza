<?php
namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class FutureDate implements Rule
{
    public function passes($attribute, $value)
    {
        return Carbon::parse($value)->isFuture();
    }

    public function message()
    {
        return "Date has to be in future";
    }
}
