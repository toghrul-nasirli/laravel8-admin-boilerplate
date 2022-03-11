<?php

namespace App\Services;

use App\Models\Locale;

class LocaleService
{
    public static function all()
    {
        return Locale::all();
    }
}