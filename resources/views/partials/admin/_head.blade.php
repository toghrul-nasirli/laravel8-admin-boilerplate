<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title') {{ config('app.name') }} | @lang('admin.control') @lang('admin.panel')</title>

@livewireStyles
<link rel="shortcut icon" href="{{ _asset('backend/img/avatar.png') }}" type="image/x-icon">
<link rel="stylesheet" href="{{ _asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ _asset('backend/css/adminlte.min.css') }}">

@yield('styles')

@if ($darkmode)
    <style>
        a {
            color: #fff;
        }

    </style>
@endif

@yield('head-scripts')
