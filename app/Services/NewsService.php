<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsService
{
    public static function all($search, $orderBy, $orderDirection, $perPage, $status)
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
        $data['slug'] = _slugify($data['title']);
        $data['image'] = _storeImage('news', $data['image']);

        News::create($data);
    }

    public static function update($news, $data)
    {
        $data['slug'] = _slugify($data['title']);
        if (request()->has('image')) {
            _deleteFile('images/news', $news->image);
            $data['image'] = _storeImage('news', $data['image']);
        }

        $news->update($data);
    }

    public static function delete($id)
    {
        $news = News::findOrFail($id);

        _deleteFile('images/news', $news->image);

        News::where('position', '>', $news->position)->update([
            'position' => DB::raw('position - 1'),
        ]);

        $news->delete();
    }

    public static function changeStatus($id)
    {
        $news = News::find($id);
        $news->status ? $news->status = false : $news->status = true;
        $news->save();
    }

    public static function changePosition($id, $direction)
    {
        $news = News::find($id);

        if ($news) {
            if ($direction === 'up') {
                News::where('position', $news->position - 1)->update([
                    'position' => $news->position,
                ]);
                $news->update([
                    'position' => $news->position - 1,
                ]);
            } else if ($direction === 'down') {
                News::where('position', $news->position + 1)->update([
                    'position' => $news->position,
                ]);
                $news->update([
                    'position' => $news->position + 1,
                ]);
            }
        }
    }
}