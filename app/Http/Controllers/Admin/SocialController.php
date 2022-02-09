<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Social\StoreSocialRequest;
use App\Http\Requests\Social\UpdateSocialRequest;
use App\Models\Social;
use App\Services\SocialService;

class SocialController extends Controller
{   
    public function index()
    {
        return view('admin.socials.index');
    }

    public function create()
    {
        $icons = SocialService::ICONS;
        
        return view('admin.socials.create', compact('icons'));
    }

    public function store(StoreSocialRequest $request)
    {
        SocialService::create($request->validated());

        return redirect()->route('admin.socials.index', _lang())->with('success', __('admin.added'));
    }

    public function edit($lang, Social $social)
    {
        $icons = SocialService::ICONS;

        return view('admin.socials.edit', compact('social', 'icons'));
    }

    public function update($lang, Social $social, UpdateSocialRequest $request)
    {
        SocialService::update($social, $request->validated());

        return redirect()->route('admin.socials.index', _lang())->with('success', __('admin.saved'));
    }
}
