<?php

namespace Modules\KamenTheme\Http\Controllers\Setting;

use Illuminate\Routing\Controller;
use Modules\KamenTheme\Actions\SettingAction;
use Modules\KamenTheme\Http\Requests\Setting\HeroRequest;

class HeroController extends Controller
{
    public function __invoke(HeroRequest $request)
    {
        if (SettingAction::set(config('kamentheme.table.hero'), $request->validated())) {
            return back()->success(__('Berhasil mengatur halaman'));
        }

        return back()->error(__('Terjadi kesalahan saat mengatur halaman'));
    }
}
