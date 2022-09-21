<?php

namespace App\Http\Requests\Post;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => ['required', 'integer'],
            'image' => ['required', 'image', 'max:2048', 'unique:posts'],
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'description' => ['nullable', 'string', 'max:255'],
            'keywords' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => __('attributes.category'),
            'image' => __('attributes.image'),
            'title' => __('attributes.title'),
            'text' => __('attributes.text'),
            'description' => __('attributes.description'),
            'keywords' => __('attributes.keywords'),
        ];
    }
}
