<?php

namespace App\Http\Requests\SliderElement;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderElementRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => ['required', 'image', 'max:2048'],
            'title' => ['required', 'string', 'max:255', 'unique:slider_elements,title'],
            'minitext' => ['nullable', 'string', 'max:255'],
            'link' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'image' => __('attributes.image'),
            'title' => __('attributes.title'),
            'minitext' => __('attributes.minitext'),
            'link' => __('attributes.link'),
        ];
    }
}
