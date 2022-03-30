<?php

namespace App\Http\Requests\SliderElement;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderElementRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => ['nullable', 'image', 'max:2048'],
            'title' => ['required', 'string', 'max:255', 'unique:slider_elements,title->' . _lang() . ',' . $this->slider_element->id],
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
