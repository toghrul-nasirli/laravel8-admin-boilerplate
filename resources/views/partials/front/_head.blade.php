<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Toghrul Nasirli">
@yield('meta-tags')

<title>@yield('title') {{ config('app.name') }}</title>

<link rel="stylesheet" href="{{ _asset('css/front.css') }}">
@yield('styles')

@yield('head-scripts')
