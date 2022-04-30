<?php

namespace App\Models;

use App\Traits\CacheRemovable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory, CacheRemovable;

    protected $fillable = [
        'logo',
        'favicon',
        'sitemap',
        'title',
        'email',
        'career_email',
        'phone',
        'career_phone',
        'about',
        'privacy_policy',
        'terms_and_conditions',
        'description',
        'keywords',
        'theme'
    ];
}
