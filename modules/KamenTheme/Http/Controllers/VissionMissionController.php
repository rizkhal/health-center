<?php

namespace Modules\KamenTheme\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\KamenTheme\Entities\Setting\VissionMission;
use Modules\KamenTheme\Http\Requests\VissionMissionRequest;

class VissionMissionController extends Controller
{
    public function __invoke(VissionMissionRequest $request)
    {
        try {
            if ($vm = VissionMission::first()) {
                $vm->update($request->getVm());
                $vm->details()->delete();
            } else {
                $vm = VissionMission::create($request->getVm());
            }

            $vm->details()->createMany(
                $request->getPointsCollection()->map(fn ($v) => [
                    'icon' => $v['icon'],
                    'text' => $v['value'],
                ])
            );

            return back()->success(__('Berhasil mengatur visi & misi'));
        } catch (\Throwable $th) {
            return back()->error(__('Terjadi kesalahan saat mengatur visi & misi'));
        }
    }
}
