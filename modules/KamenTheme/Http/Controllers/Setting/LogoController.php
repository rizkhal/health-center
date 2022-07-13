<?php

namespace Modules\KamenTheme\Http\Controllers\Setting;

use Illuminate\Routing\Controller;
use Modules\KamenTheme\Actions\SettingAction;
use Modules\KamenTheme\Http\Requests\Setting\LogoRequest;

class LogoController extends Controller
{
    public function __invoke(LogoRequest $request)
    {
        try {
            SettingAction::set('setting_logo', $request->getData());

            return back()->success(__('Berhasil mengatur logo aplikasi'));
        } catch (\Throwable $th) {
            return back()->error(__('Terjadi kesalahan saat mengatur logo'));
        }
    }
}
