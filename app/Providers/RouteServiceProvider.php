<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const FRONT = '/';
    public const ADMIN = '/az/admin/users';

    // protected $namespace = 'App\\Http\\Controllers';

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix('{lang}')
                ->where(['lang' => '[a-zA-Z]{2}'])
                ->middleware('front')
                ->namespace($this->namespace)
                ->group(base_path('routes/front.php'));

            Route::prefix('{lang}/admin')
                ->where(['lang' => '[a-zA-Z]{2}'])
                ->middleware('admin')
                ->namespace($this->namespace)
                ->name('admin.')
                ->group(base_path('routes/admin.php'));

            Route::prefix('{lang}')
                ->where(['lang' => '[a-zA-Z]{2}'])
                ->middleware('auth')
                ->namespace($this->namespace)
                ->group(base_path('routes/auth.php'));
        });
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
