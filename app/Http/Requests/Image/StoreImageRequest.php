<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'filename' => ['required', 'image', 'max:2048', 'unique:images,filename'],
        ];
    }

    public function attributes()
    {
        return [
            'filename' => __('attributes.filename'),
        ];
    }
}
