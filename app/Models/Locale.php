<?php

namespace App\Models;

use App\Traits\CacheRemovable;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    use CacheRemovable;
    
    public $timestamps = false;
}
