<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('_dda')) {
    function _dd($data)
    {
        return dd($data)->toArray();
    }
}

if (!function_exists('_lang')) {
    function _lang()
    {
        return app()->getLocale();
    }
}

if (!function_exists('_currentRoute')) {
    function _currentRoute(): string
    {
        return request()->route()->getName();
    }
}

if (!function_exists('_currentRouteParameters')) {
    function _currentRouteParameters(): array
    {
        return Route::current()->parameters();
    }
}

if (!function_exists('_isRoute')) {
    function _isRoute($route): bool
    {
        return $route === request()->route()->getName();
    }
}

if (!function_exists('_isRequest')) {
    function _isRequest($request): bool
    {
        return request()->is(app()->getLocale() . '/' .  $request);
    }
}
