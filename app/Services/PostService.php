<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public static function all($search, $orderBy, $orderDirection, $perPage)
    {
        return Post::search([
            'id',
            'title',
            'text',
        ], $search)->orderBy($orderBy, $orderDirection)
            ->paginate($perPage);
    }

    public static function create($data)
    {
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

    public static function delete($id)
    {
        $post = Post::findOrFail($id);

        _deleteFile('images/posts', $post->image);
        $post->delete();
    }
}
