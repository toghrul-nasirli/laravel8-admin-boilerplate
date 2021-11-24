<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        app()->setLocale($request->lang);
        URL::defaults(['lang' => _lang()]);

        return $next($request);
    }
}
