<?php

namespace App\Services;

use App\Models\Locale as Locale;

class LocaleService
{
    public static function all()
    {
        return Locale::all();
    }
}