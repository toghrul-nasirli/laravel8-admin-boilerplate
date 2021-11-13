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
            'sitemap' => ['nullable', 'mimes:xml'],
            'title' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email:dns'],
            'about' => ['required', 'string'],
            'description' => ['nullable', 'string', 'max:255'],
            'keywords' => ['nullable', 'string', 'max:255'],
        ];
    }
    
    public function messages()
    {
        return [
            'required' => ':attribute bölməsi boş buraxıla bilməz!',
            'string' => ':attribute simvollardan ibarət olmalıdır.',
            'image' => ':attribute şəkil formatında olmalıdır.',
            'mimes' => ':attribute bu fayl tiplərində ola bilər: :values.',
            'min' => ':attribute bölməsi minimum :min simvol ola bilər!',
            'max' => ':attribute bölməsi maksimum :max simvol ola bilər!',
            'email' => 'E-poçt ünvanı düzgün qeyd olunmayıb!',
        ];
    }

    public function attributes()
    {
        return [
            'logo' => 'Loqo',
            'favicon' => 'Favicon',
            'sitemap' => 'Sitemap',
            'title' => 'Başlıq',
            'email' => 'E-poçt ünvanı',
            'about' => 'Haqqında',
            'description' => 'META Description',
            'keywords' => 'META Keywords',
        ];
    }
}
