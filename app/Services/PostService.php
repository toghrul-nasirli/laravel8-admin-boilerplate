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
        Post::create($data);
    }

    public static function update($post, $data)
    {
        $post->update($data);
    }

    public static function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }
}
