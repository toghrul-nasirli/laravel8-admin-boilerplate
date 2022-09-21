<?php

namespace App\Models;

use App\Traits\CacheRemovable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Settings extends Model
{
    use HasFactory, HasTranslations, CacheRemovable;

    protected $fillable = [
        'logo',
        'favicon',
        'sitemap',
        'title',
        'email',
        'phone',
        'about',
        'description',
        'keywords',
    ];

    public $translatable = [
        'title',
        'about',
        'description',
        'keywords',
    ];
}
