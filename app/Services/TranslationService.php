<?php

namespace App\Services;

use App\Models\Translation;

class TranslationService
{
    public static function all($search, $group, $orderBy, $orderDirection, $perPage)
    {
        return Translation::search([
            'id',
            'key',
            'text',
        ], $search)
            ->where('group', $group)
            ->orderBy($orderBy, $orderDirection)
            ->paginate($perPage);
    }

    public static function create($group, $data)
    {
        $locales = LocaleService::all();
        
        foreach ($locales as $locale) {
            $translation[$locale->key] = $data[$locale->key];
        }
        
        $data['group'] = $group;
        $data['text'] = $translation;

        Translation::create($data);
    }

    public static function update($translation, $data)
    {
        $translation->update($data);
    }

    public static function delete($id)
    {
        $translation = Translation::findOrFail($id);
        $translation->delete();
    }
}