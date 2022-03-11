<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class SendApplyMailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fullname' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'string', 'email:dns'],
            'phone' => ['required', 'max:255', 'string'],
            'message' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'fullname' => __('mail.fullname'),
            'email' => __('mail.email'),
            'phone' => __('mail.phone'),
            'message' => __('mail.message'),
        ];
    }
}
