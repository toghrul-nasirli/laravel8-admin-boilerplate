<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateSettigsRequest;
use App\Services\SettingsService;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SettingsService::all();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(UpdateSettigsRequest $request)
    {
        SettingsService::update($request->validated());

        return redirect()->route('admin.settings')->with('success', 'Dəyişikliklər müvəffəqiyyətlə yadda saxlanıldı!');
    }
}
