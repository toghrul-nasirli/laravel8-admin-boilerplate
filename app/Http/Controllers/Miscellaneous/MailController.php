<?php

namespace App\Http\Controllers\Miscellaneous;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\SendApplyMailRequest;
use App\Mail\Front\ApplyMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function apply(SendApplyMailRequest $request)
    {
        Mail::send(new ApplyMail($request->validated()));
        
        return redirect()->route('index')->with('sent', __('admin.mail-thanks'));
    }
}
