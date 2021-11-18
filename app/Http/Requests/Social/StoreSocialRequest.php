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

    public function messages()
    {
        return [
            'required' => ':attribute bölməsi boş buraxıla bilməz!',
            'max' => ':attribute bölməsi maksimum :max simvol ola bilər!',
            'string' => ':attribute bölməsi ancaq simvol qəbul edir!',
        ];
    }

    public function attributes()
    {
        return [
            'icon' => 'Icon',
            'link' => 'Link',
        ];
    }
}
