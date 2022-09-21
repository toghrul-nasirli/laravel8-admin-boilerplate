<?php

namespace App\Http\Requests\PostCategory;

use Illuminate\Foundation\Http\FormRequest;

class StorePostCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:post_categories,name'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('attributes.name'),
        ];
    }
}
