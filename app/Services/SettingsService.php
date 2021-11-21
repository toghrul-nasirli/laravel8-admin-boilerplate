<?php

namespace App\Services;

use App\Models\Settings;
use Spatie\Sitemap\SitemapGenerator;

class SettingsService
{
    public static function all()
    {
        return Settings::first();
    }

    public static function getRobotsTxt()
    {
        $fileStream = fopen('robots.txt', 'r');
        $robots = fread($fileStream, filesize('robots.txt'));
        fclose($fileStream);
        
        return $robots;
    }

    public static function update($data)
    {
        $settings = Settings::first();

        if (request()->logo) {
            _deleteFile('images/settings', $settings->logo);
            $data['logo'] = _storeImage('settings', $data['logo']);
        }

        if (request()->favicon) {
            _deleteFile('settings', $settings->favicon);
            $data['favicon'] = _storeImage('settings', $data['favicon']);
        }

        Settings::first()->update($data);
    }

    public static function updateSeo($data)
    {
        $fileStream = fopen('robots.txt', 'w');
        fwrite($fileStream, $data['robots']);
        fclose($fileStream);

        Settings::first()->update($data);
    }

    public static function updateSitemap()
    {
        $fileName = 'sitemap.xml';
        $path = public_path('sitemaps/');

        ini_set('memory_limit', '-1');
        set_time_limit(0);
        ini_set('max_execution_time', 0);
        ignore_user_abort(true);

        if (file_exists($path . $fileName)) {
            rename($path . $fileName, $path . 'sitemap-old-' . date('Y-m-d H-i') . '.xml');
        }

        SitemapGenerator::create(config('app.url'))->writeToFile($path . $fileName);
    }
}
