<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Routing\Controller;

class SettingController extends Controller
{
    public function __invoke()
    {
        return inertia('Core::setting/index', ['settings' => []])->title(__('Setting'));
    }
}
