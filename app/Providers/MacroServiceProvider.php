<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Builder::macro('search', function ($attributes, $string) {
            $this->where(function (Builder $query) use ($attributes, $string) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->orWhere($attribute, 'like', '%' . $string . '%');
                }
            });

            return $this;
        });
    }
}
