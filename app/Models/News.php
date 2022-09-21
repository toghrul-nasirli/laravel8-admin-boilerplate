<?php

namespace App\Models;

use App\Traits\CacheRemovable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasFactory, HasTranslations, CacheRemovable;

    protected $fillable = [
        'position',
        'image',
        'title',
        'text',
        'description',
        'keywords',
    ];

    public $translatable = [
        'title',
        'text',
        'description',
        'keywords',
    ];

    public function getSlugAttribute(): string
    {
        return _slugify($this->title);
    }
}
