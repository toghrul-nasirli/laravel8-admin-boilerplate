<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request)
    {
        PostService::create($request->validated());

        return redirect()->route('admin.posts.index', _lang())->with('success', __('admin.added'));
    }

    public function edit($lang, Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update($lang, Post $post, UpdatePostRequest $request)
    {
        PostService::update($post, $request->validated());

        return redirect()->route('admin.posts.index', _lang())->with('success', __('admin.saved'));
    }
}
