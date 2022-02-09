<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateSeoSettingsRequest;
use App\Http\Requests\Settings\UpdateSettigsRequest;
use App\Services\SettingsService;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SettingsService::all();
        $robots = SettingsService::getRobotsTxt();

        return view('admin.settings.index', compact('settings', 'robots'));
    }

    public function update(UpdateSettigsRequest $request)
    {
        SettingsService::update($request->validated());

        return back()->with('success', __('admin.saved'));
    }

    public function updateSeo(UpdateSeoSettingsRequest $request)
    {
        SettingsService::updateSeo($request->validated());

        return back()->with('success', __('admin.saved'));
    }

    public function updateSitemap()
    {
        SettingsService::updateSitemap();

        return back()->with('sitemap-success', __('admin.sitemap-updated'));
    }
}
