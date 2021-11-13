<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;

Route::resource('users', UserController::class)->except('show', 'destroy');
Route::get('settings', [SettingsController::class, 'index'])->name('settings');
Route::patch('settings', [SettingsController::class, 'update'])->name('settings.update');
