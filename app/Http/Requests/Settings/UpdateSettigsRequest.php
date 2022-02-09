<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettigsRequest extends FormRequest
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
            'privacy_policy' => ['required', 'string'],
            'terms_and_conditions' => ['required', 'string'],
        ];
    }
    
    public function attributes()
    {
        return [
            'logo' => __('attributes.logo'),
            'favicon' => __('attributes.favicon'),
            'title' => __('attributes.title'),
            'email' => __('attributes.email'),
            'phone' => __('attributes.career_email'),
            'about' => __('attributes.about'),
            'privacy_policy' => __('attributes.privacy_policy'),
            'terms_and_conditions' => __('attributes.terms_and_conditions'),
        ];
    }
}
