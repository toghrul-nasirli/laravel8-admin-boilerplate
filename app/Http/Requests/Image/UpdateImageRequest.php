<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'filename' => ['nullable', 'image', 'max:2048', 'unique:images,filename' . ',' . $this->image->id],
        ];
    }

    public function attributes()
    {
        return [
            'filename' => __('attributes.filename'),
        ];
    }
}
