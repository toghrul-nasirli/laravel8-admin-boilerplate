<?php

namespace App\Http\Requests\Social;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'icon' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
        ];
    }
    
    public function attributes()
    {
        return [
            'icon' => __('attributes.icon'),
            'link' => __('attributes.link'),
        ];
    }
}
