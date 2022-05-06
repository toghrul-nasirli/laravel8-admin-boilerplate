<?php

namespace App\Services\Product;

use App\Services\BaseService;

class ImageService extends BaseService
{
    public static function all($product)
    {
        return $product->images()->with('imageable');
    }

    public static function withFilter($product, $search, $orderBy, $orderDirection, $perPage, $status)
    {
        return $product->images()->search([
            'position',
            'filename',
        ], $search)
            ->with('imageable')
            ->when($status != 'all', function ($query) use ($status) {
                $query->where('status', $status);
            })->orderBy($orderBy, $orderDirection)
            ->paginate($perPage);
    }

    public static function create($product, $data)
    {
        $data['position'] = $product->images()->max('position') + 1;
        $data['filename'] = _storeImage('imageables', $data['filename']);
        
        $product->images()->create($data);
    }

    public static function update($image, $data)
    {
        if (request()->has('filename')) {
            _deleteFile('images/imageables', $image->filename);
            $data['filename'] = _storeImage('imageables', $data['filename']);
        }

        $image->update($data);
    }
}