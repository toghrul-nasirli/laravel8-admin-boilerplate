<?php

namespace App\Services;

use App\Models\Post;

class PostService extends BaseService
{
    public static function withFilter($search, $orderBy, $orderDirection, $perPage, $status)
    {
        return Post::search([
            'position',
            'title',
            'text',
        ], $search)
            ->with('category')
            ->when($status != 'all', function ($query) use ($status) {
                $query->where('status', $status);
            })->orderBy($orderBy, $orderDirection)
            ->paginate($perPage);
    }

    public static function create($data)
    {
        $data['position'] = Post::max('position') + 1;
        $data['image'] = _storeImage('posts', $data['image']);

        Post::create($data);
    }

    public static function update($post, $data)
    {
        if (request()->has('image')) {
            _deleteFile('images/posts', $post->image);
            $data['image'] = _storeImage('posts', $data['image']);
        }

        $post->update($data);
    }
}
