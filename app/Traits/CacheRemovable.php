<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait CacheRemovable
{
    public static function CacheRemovable()
    {
        static::saved(function () {
            Cache::flush();
        });
    }
}
