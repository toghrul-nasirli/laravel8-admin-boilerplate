<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => ['required', 'string', 'email:dns', 'max:255', "unique:users,email,{$this->user->id}"],
            'password' => ['nullable', 'string', 'min:4', 'max:255', 'confirmed'],
        ];
    }

    public function attributes()
    {
        return [
            'is_admin' => __('attributes.is_admin'),
            'username' => __('attributes.username'),
            'email' => __('attributes.email'),
            'password' => __('attributes.password'),
        ];
    }
}
