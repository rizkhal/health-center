<?php

namespace Modules\KamenTheme\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Modules\KamenTheme\Entities\Setting\Hero;
use Modules\KamenTheme\Entities\Setting\Logo;

class KamenThemeController extends Controller
{
    public function post()
    {
        return Inertia::render('KamenTheme::index', [
            'hero' => Hero::first(),
            'logo' => Logo::first(),
        ])->title(__('Landing Page'));
    }

    public function video()
    {
        return Inertia::render('KamenTheme::video');
    }
}
