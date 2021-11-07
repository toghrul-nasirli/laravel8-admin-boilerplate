<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.front._head')
</head>

<body>
    <main>
        @yield('content')
    </main>

    @include('partials.front._scripts')
</body>

</html>