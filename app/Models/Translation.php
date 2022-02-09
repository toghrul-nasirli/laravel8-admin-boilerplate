<?php

namespace App\Models;

use App\Traits\CacheRemovable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\TranslationLoader\LanguageLine;

class Translation extends LanguageLine
{
    use HasFactory, CacheRemovable;
}
