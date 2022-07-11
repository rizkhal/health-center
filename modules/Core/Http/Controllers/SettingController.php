<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\KamenTheme\Entities\Setting\Hero;

class SettingController extends Controller
{
    public function __invoke()
    {
        return inertia('Core::setting/index', [
            'settings' => [],
            'hero' => Hero::first(),
        ])->title(__('Setting'));
    }
}
