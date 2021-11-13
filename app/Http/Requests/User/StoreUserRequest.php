<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'is_admin' => ['required', 'boolean'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bölməsi boş buraxıla bilməz!',
            'email' => 'E-poçt ünvanı düzgün qeyd olunmayıb!',
            'min' => ':attribute bölməsi minimum :min simvol ola bilər!',
            'max' => ':attribute bölməsi maksimum :max simvol ola bilər!',
            'unique' => ':attribute bölməsi təkrarlanmamalıdır!',
            'confirmed' => ':attribute təkrar şifrə ilə uyğun deyil!',
            'boolean' => ':attribute bölməsi admin və ya istifadəçi olmalıdır!',
        ];
    }

    public function attributes()
    {
        return [
            'is_admin' => 'Vəzifə',
            'username' => 'İstifadəçi adı',
            'email' => 'E-poçt ünvanı',
            'password' => 'Şifrə',
        ];
    }
}
