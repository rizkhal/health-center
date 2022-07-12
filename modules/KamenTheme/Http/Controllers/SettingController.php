<?php

namespace Modules\KamenTheme\Http\Controllers;

use Inertia\Response;
use Illuminate\Routing\Controller;
use Modules\KamenTheme\Entities\Setting\Hero;
use Modules\KamenTheme\Entities\Setting\Logo;
use Modules\KamenTheme\Entities\Setting\VissionMission;

class SettingController extends Controller
{
    public function index(): Response
    {
        return inertia('KamenTheme::setting/index', [
            'hero' => Hero::first(),
            'logo' => Logo::first(),
            'vission' => VissionMission::with('details')->first(),
        ])->title(__('Pengaturan'));
    }
}
