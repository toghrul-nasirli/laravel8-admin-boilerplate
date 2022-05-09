<?php

namespace App\Services;

use App\Models\Translation;

class TranslationService extends BaseService
{
    public static function withFilter($search, $group, $orderBy, $orderDirection, $perPage)
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
            $text[$locale->key] = $data[$locale->key];
        }
        
        $data['group'] = $group;
        $data['text'] = $text;

        Translation::create($data);
    }

    public static function update($translation, $data)
    {
        $locales = LocaleService::all();
        
        foreach ($locales as $locale) {
            $text[$locale->key] = $data[$locale->key];
        }
        
        $data['text'] = $text;

        $translation->update($data);
    }
}