<?php

namespace App\Http\View\Composers\Admin;

use App\Services\LocaleService;
use Illuminate\View\View;

class NavViewComposer
{
    public function compose(View $view)
    {
        $locales = LocaleService::all();

        $view->with('locales', $locales);
    }
}