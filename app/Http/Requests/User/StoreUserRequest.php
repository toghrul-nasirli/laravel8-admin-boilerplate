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
