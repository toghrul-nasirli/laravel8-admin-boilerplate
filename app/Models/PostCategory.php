<?php

namespace App\Models;

use App\Traits\CacheRemovable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PostCategory extends Model
{
    use HasFactory, HasTranslations, CacheRemovable;

    protected $fillable = [
        'position',
        'name',
    ];

    public $translatable = [
        'name',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
