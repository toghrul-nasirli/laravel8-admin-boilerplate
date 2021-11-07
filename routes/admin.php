<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::resource('users', UserController::class)->except('show', 'destroy');
