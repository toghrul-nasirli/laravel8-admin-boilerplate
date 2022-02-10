<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\News;
use App\Services\NewsService;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(StoreNewsRequest $request)
    {
        NewsService::create($request->validated());

        return redirect()->route('admin.news.index', _lang())->with('success', __('admin.added'));
    }

    public function edit($lang, News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update($lang, News $news, UpdateNewsRequest $request)
    {
        NewsService::update($news, $request->validated());

        return redirect()->route('admin.news.index', _lang())->with('success', __('admin.saved'));
    }
}
