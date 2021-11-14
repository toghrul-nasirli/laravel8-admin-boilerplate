<?php

namespace App\Http\Requests\Translation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTranslationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'key' => ['required', 'string', 'max:255', "unique:translations,key,{$this->translation->id}"],
        ];
    }

    public function attributes()
    {
        return [
            'key' => 'Açar sözü',
        ];
    }
}
