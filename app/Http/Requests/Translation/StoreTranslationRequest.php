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
            'key' => ['required', 'string', 'max:255', 'unique:translations,key'],
        ];
        
        foreach ($locales as $locale) {
            $rules += [$locale->key => 'string'];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'group' => 'Qrup',
            'key' => 'Açar sözü',
        ];
    }
}
