<?php

namespace App\Models;

use App\Traits\CacheRemovable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory, CacheRemovable;

    protected $fillable = [
        'position',
        'icon',
        'link',
    ];
}
