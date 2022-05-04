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
        'slug',
        'parent_id',
        'image',
        'name',
        'text',
        'description',
        'keywords',
    ];

    public $translatable = [
        'slug',
        'name',
        'text',
        'description',
        'keywords',
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('position');
    }
}
