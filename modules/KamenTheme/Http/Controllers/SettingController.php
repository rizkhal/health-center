<?php

namespace Modules\KamenTheme\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Response;
use Modules\KamenTheme\Actions\SettingAction;
use Modules\KamenTheme\Entities\Setting\Hero;
use Modules\KamenTheme\Entities\Setting\Logo;

class SettingController extends Controller
{
    public function index(): Response
    {
        return inertia('KamenTheme::setting/index', [
            'hero' => Hero::first(),
            'logo' => Logo::first(),
        ])->title(__('Pengaturan'));
    }
}
