<?php

namespace App\Http\Requests\Translation;

use App\Services\LocaleService;
use Illuminate\Foundation\Http\FormRequest;

class StoreTranslationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $locales = LocaleService::all();

        $rules = [
            'key' => ['required', 'string', 'max:255'],
        ];

        foreach ($locales as $locale) {
            $rules += [$locale->key => ['nullable', 'string']];
        }

        return $rules;
    }

    public function attributes()
    {
        $locales = LocaleService::all();

        $attributes = [
            'key' => __('attributes.key'),
        ];

        foreach ($locales as $locale) {
            $attributes += [$locale->key => strtoupper($locale->key)];
        }

        return $attributes;
    }
}
