<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategory\StorePostCategoryRequest;
use App\Http\Requests\PostCategory\UpdatePostCategoryRequest;
use App\Models\PostCategory;
use App\Services\PostCategoryService;

class PostCategoryController extends Controller
{
    public function index()
    {
        return view('admin.post-categories.index');
    }

    public function create()
    {
        return view('admin.post-categories.create');
    }

    public function store(StorePostCategoryRequest $request)
    {
        PostCategoryService::create($request->validated());

        return redirect()->route('admin.post-categories.index', _lang())->with('success', __('admin.added'));
    }

    public function edit($lang, PostCategory $postCategory)
    {
        return view('admin.post-categories.edit', compact('postCategory'));
    }

    public function update($lang, PostCategory $postCategory, UpdatePostCategoryRequest $request)
    {
        PostCategoryService::update($postCategory, $request->validated());

        return redirect()->route('admin.post-categories.index', _lang())->with('success', __('admin.saved'));
    }
}
