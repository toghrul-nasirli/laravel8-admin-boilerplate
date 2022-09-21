<?php

namespace App\Services;

use App\Models\News;

class NewsService extends BaseService
{
    public static function withFilter($search, $orderBy, $orderDirection, $perPage, $status)
    {
        return News::search([
            'position',
            'title',
        ], $search)
            ->when($status != 'all', function ($query) use ($status) {
                $query->where('status', $status);
            })->orderBy($orderBy, $orderDirection)
            ->paginate($perPage);
    }

    public static function create($data)
    {
        $data['position'] = News::max('position') + 1;
        $data['image'] = _storeImage('news', $data['image']);

        News::create($data);
    }

    public static function update($news, $data)
    {
        if (request()->has('image')) {
            _deleteFile('images/news', $news->image);
            $data['image'] = _storeImage('news', $data['image']);
        }

        $news->update($data);
    }
}