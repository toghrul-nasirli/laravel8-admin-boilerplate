<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => ['required', 'image', 'max:2048'],
            'title' => ['required', 'string', 'max:255', 'unique:news,title->' . _lang()],
            'text' => ['required', 'string'],
            'description' => ['nullable', 'string', 'max:255'],
            'keywords' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'image' => __('attributes.image'),
            'title' => __('attributes.title'),
            'text' => __('attributes.text'),
            'description' => __('attributes.description'),
            'keywords' => __('attributes.keywords'),
        ];
    }
}
