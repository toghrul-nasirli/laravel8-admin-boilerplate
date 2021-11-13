<?php

namespace App\Services;

use App\Models\Settings;

class SettingsService
{
    public static function all()
    {
        return Settings::first();
    }

    public static function update($data)
    {
        $settings = Settings::first();

        if (request()->logo) {
            deleteImage('settings', $settings->logo);
            $data['logo'] = storeImage('settings', $data['logo']);
        }

        if (request()->favicon) {
            deleteImage('settings', $settings->favicon);
            $data['favicon'] = storeImage('settings', $data['favicon']);
        }

        if (request()->sitemap) {
            deleteFile('settings', $settings->sitemap);
            $settings['sitemap'] = storeFile('settings', $data['sitemap']);
        }

        Settings::first()->update($data);
    }
}
