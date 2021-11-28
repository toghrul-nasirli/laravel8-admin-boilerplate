<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public static function all($search, $orderBy, $orderDirection, $perPage, $status)
    {
        return Post::search([
            'position',
            'title',
            'text',
        ], $search)
            ->when($status != 'all', function ($query) use ($status) {
                $query->where('status', $status);
            })->orderBy($orderBy, $orderDirection)
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

    public static function changeStatus($id)
    {
        $post = Post::find($id);
        $post->status ? $post->status = false : $post->status = true;
        $post->save();
    }

    public static function changePosition($id, $direction)
    {
        $post = Post::find($id);

        if ($post) {
            if ($direction === 'up') {
                Post::where('position', $post->position - 1)->update([
                    'position' => $post->position,
                ]);
                $post->update([
                    'position' => $post->position - 1,
                ]);
            } else if ($direction === 'down') {
                Post::where('position', $post->position + 1)->update([
                    'position' => $post->position,
                ]);
                $post->update([
                    'position' => $post->position + 1,
                ]);
            }
        }
    }
}
