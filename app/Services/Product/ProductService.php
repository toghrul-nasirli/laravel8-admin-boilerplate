<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Services\BaseService;

class ProductService extends BaseService
{
    public static function all()
    {
        return Product::whereNull('parent_id')
            ->with('children', function ($query) {
                return $query->with('children')
                    ->withCount('children');
            })
            ->withCount('children')
            ->orderBy('position')
            ->get();
    }
}
