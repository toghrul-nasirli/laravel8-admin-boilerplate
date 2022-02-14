@component('mail::message')
# {{ config('app.name') }} - @lang('mail.apply-form')
<hr>

<strong>@lang('mail.fullname')</strong> {{ $data['fullname'] }}
<strong>@lang('mail.email')</strong> {{ $data['email'] }}
<strong>@lang('mail.phone')</strong> {{ $data['phone'] }}
<strong>@lang('mail.message')</strong> {{ $data['message'] }}
@endcomponent
