<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Translation\StoreTranslationRequest;
use App\Http\Requests\Translation\UpdateTranslationRequest;
use App\Models\Translation;
use App\Services\LocaleService;
use App\Services\TranslationService;

class TranslationController extends Controller
{
    public function index($lang, $group)
    {
        return view('admin.translations.index', compact('group'));
    }

    public function create($lang, $group)
    {
        $locales = LocaleService::all();

        return view('admin.translations.create', compact('group', 'locales'));
    }

    public function store($lang, $group, StoreTranslationRequest $request)
    {
        TranslationService::create($group, $request->validated());

        return redirect()->route('admin.translations.index', ['lang' => lang(), 'group' => $group])->with('success', 'Müvəffəqiyyətlə əlavə olundu!');
    }

    public function edit($lang, Translation $translation)
    {
        $locales = LocaleService::all();

        return view('admin.translations.edit', compact('translation', 'locales'));
    }

    public function update($lang, Translation $translation, UpdateTranslationRequest $request)
    {
        TranslationService::update($translation, $request->validated());

        return redirect()->route('admin.translations.index', ['lang' => lang(), 'group' => $translation->group])->with('success', 'Dəyişikliklər müvəffəqiyyətlə yadda saxlanıldı!');
    }
}
