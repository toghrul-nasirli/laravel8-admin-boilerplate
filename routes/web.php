<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', _lang(), 301);
Route::redirect('/admin', _lang() . '/admin', 301);
