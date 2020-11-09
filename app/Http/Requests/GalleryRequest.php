<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string',
        ];
    }
}
