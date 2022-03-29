<?php

namespace App\Models;

use App\Traits\CacheRemovable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory, HasTranslations, CacheRemovable;

    protected $fillable = [
        'position',
        'slug',
        'category_id',
        'image',
        'title',
        'text',
        'description',
        'keywords',
    ];

    public $translatable = [
        'slug',
        'title',
        'text',
        'description',
        'keywords',
    ];

    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }
}
