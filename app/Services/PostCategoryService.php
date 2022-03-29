<?php

namespace App\Services;

use App\Models\PostCategory;

class PostCategoryService extends BaseService
{
    public static function all()
    {
        return PostCategory::orderBy('position')->get();
    }

    public static function withFilter($search, $orderBy, $orderDirection, $perPage, $status)
    {
        return PostCategory::search([
            'position',
            'name',
        ], $search)
            ->when($status != 'all', function ($query) use ($status) {
                $query->where('status', $status);
            })->orderBy($orderBy, $orderDirection)
            ->paginate($perPage);
    }

    public static function create($data)
    {
        $data['position'] = PostCategory::max('position') + 1;

        PostCategory::create($data);
    }

    public static function update($postCategory, $data)
    {
        $postCategory->update($data);
    }
}