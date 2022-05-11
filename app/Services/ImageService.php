<?php

namespace App\Services;

use App\Services\BaseService;

class ImageService extends BaseService
{
    public static function all($imageable)
    {
        return $imageable->images()->with('imageable');
    }

    public static function withFilter($imageable, $search, $orderBy, $orderDirection, $perPage, $status)
    {
        return $imageable->images()->search([
            'position',
            'filename',
        ], $search)
            ->with('imageable')
            ->when($status != 'all', function ($query) use ($status) {
                $query->where('status', $status);
            })->orderBy($orderBy, $orderDirection)
            ->paginate($perPage);
    }

    public static function create($imageable, $data)
    {
        $data['position'] = $imageable->images()->max('position') + 1;
        $data['filename'] = _storeImage('imageables', $data['filename']);
        
        $imageable->images()->create($data);
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