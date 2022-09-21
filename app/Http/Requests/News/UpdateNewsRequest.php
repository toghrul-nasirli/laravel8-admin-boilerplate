<?php

namespace App\Http\Requests\News;

use App\Models\News;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => ['nullable', 'image', 'max:2048', 'unique:posts'],
            'title' => ['required', 'string', 'max:255'],
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
