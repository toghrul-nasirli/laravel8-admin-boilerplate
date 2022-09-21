<?php

namespace App\Http\Requests\PostCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:post_categories,name,' . $this->post_category->id],
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('attributes.name'),
        ];
    }
}
