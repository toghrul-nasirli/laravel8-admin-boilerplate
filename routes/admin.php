<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;

Route::resource('users', UserController::class)->except('show', 'destroy');

Route::get('settings', [SettingsController::class, 'index'])->name('settings');
Route::patch('settings/update', [SettingsController::class, 'update'])->name('settings.update');
Route::patch('settings/update-seo', [SettingsController::class, 'updateSeo'])->name('settings.update-seo');
Route::get('settings/update-sitemap', [SettingsController::class, 'updateSitemap'])->name('settings.update-sitemap');
