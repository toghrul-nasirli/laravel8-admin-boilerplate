<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'logo' => ['nullable', 'image'],
            'favicon' => ['nullable', 'image'],
            'title' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email:dns'],
            'phone' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string'],
        ];
    }
    
    public function attributes()
    {
        return [
            'logo' => __('attributes.logo'),
            'favicon' => __('attributes.favicon'),
            'title' => __('attributes.title'),
            'email' => __('attributes.email'),
            'phone' => __('attributes.phone'),
            'about' => __('attributes.about'),
        ];
    }
}
