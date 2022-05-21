<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $directives = require app_path('Utilities/Directives/directives.php');

        collect($directives)->each(function ($item, $key) {
            Blade::directive($key, $item);
        });
    }
}
