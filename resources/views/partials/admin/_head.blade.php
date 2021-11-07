<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title') {{ config('app.name') }} | Admin panel</title>

@livewireStyles
<link rel="shortcut icon" href="{{ asset('backend/img/avatar.png') }}" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/adminlte.min.css') }}">
@yield('styles')
@yield('head-scripts')