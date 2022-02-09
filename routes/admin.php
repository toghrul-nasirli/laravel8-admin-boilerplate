<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\Admin\UserController;

Route::get('settings', [SettingsController::class, 'index'])->name('settings');
Route::patch('settings/update', [SettingsController::class, 'update'])->name('settings.update');
Route::patch('settings/update-seo', [SettingsController::class, 'updateSeo'])->name('settings.update-seo');
Route::get('settings/update-sitemap', [SettingsController::class, 'updateSitemap'])->name('settings.update-sitemap');

Route::resource('users', UserController::class)->except('show', 'destroy');
Route::resource('posts', PostController::class)->except('show', 'destroy');
Route::resource('socials', SocialController::class)->except('show', 'destroy');

Route::get('translations/{group}', [TranslationController::class, 'index'])->name('translations.index');
Route::get('translations/{group}/create', [TranslationController::class, 'create'])->name('translations.create');
Route::post('translations/{group}', [TranslationController::class, 'store'])->name('translations.store');
Route::get('translations/{translation}/edit', [TranslationController::class, 'edit'])->name('translations.edit');
Route::patch('translations/{translation}', [TranslationController::class, 'update'])->name('translations.update');
