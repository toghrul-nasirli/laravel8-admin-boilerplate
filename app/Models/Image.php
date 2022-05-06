<?php

namespace App\Models;

use App\Traits\CacheRemovable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory, CacheRemovable;

    protected $fillable = [
        'position',
        'filename',
    ];
    
    public function imageable()
    {
        return $this->morphTo();
    }
}
