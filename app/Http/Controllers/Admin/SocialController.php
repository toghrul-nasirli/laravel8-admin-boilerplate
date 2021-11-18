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
        $socials = SocialService::all();

        return view('admin.socials.index', compact('socials'));
    }

    public function create()
    {
        $icons = SocialService::ICONS;
        
        return view('admin.socials.create', compact('icons'));
    }

    public function store(StoreSocialRequest $request)
    {
        SocialService::create($request->validated());

        return redirect()->route('admin.socials.index')->with('success', 'Müvəffəqiyyətlə əlavə olundu!');
    }

    public function edit(Social $social)
    {
        $icons = SocialService::ICONS;

        return view('admin.socials.edit', compact('social', 'icons'));
    }

    public function update(Social $social, UpdateSocialRequest $request)
    {
        SocialService::update($social, $request->validated());

        return redirect()->route('admin.socials.index')->with('success', 'Dəyişikliklər müvəffəqiyyətlə yadda saxlanıldı!');
    }
}
