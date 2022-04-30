<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.admin._head')
</head>

<body class="hold-transition sidebar-mini layout-fixed {{ $darkmode ? 'dark-mode' : '' }}">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('backend/img/avatar.png') }}" height="60" width="60">
    </div>

    <div class="wrapper">
        @include('partials.admin._nav')
        @include('partials.admin._aside')

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    @include('partials.admin._scripts')
    @include('partials.admin._messages')
</body>

</html>