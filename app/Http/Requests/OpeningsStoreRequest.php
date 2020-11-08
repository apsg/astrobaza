<?php
namespace App\Http\Requests;

use App\Rules\FutureDate;
use App\Rules\Hour;
use Illuminate\Foundation\Http\FormRequest;

class OpeningsStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'date' => ['required', 'date', new FutureDate()],
            'from' => ['required', new Hour()],
            'to'   => ['required', new Hour()],
        ];
    }
}
