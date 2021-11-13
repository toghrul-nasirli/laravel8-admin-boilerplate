<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeoSettingsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => ['nullable', 'string', 'max:255'],
            'keywords' => ['nullable', 'string', 'max:255'],
            'robots' => ['required', 'string', 'max:2048'],
        ];
    }

    public function attributes()
    {
        return [
            'description' => 'META Description',
            'keywords' => 'META Keywords',
            'robots.txt' => 'META Description',
        ];
    }
}
