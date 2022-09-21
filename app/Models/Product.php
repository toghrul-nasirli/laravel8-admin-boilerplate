<?php

namespace App\Models;

use App\Traits\CacheRemovable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations, CacheRemovable;

    protected $fillable = [
        'position',
        'parent_id',
        'image',
        'name',
        'text',
        'description',
        'keywords',
    ];

    public $translatable = [
        'name',
        'text',
        'description',
        'keywords',
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('position');
    }

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getSlugAttribute(): string
    {
        return _slugify($this->title);
    }
}
