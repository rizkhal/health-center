<?php

namespace Modules\KamenTheme\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Response;
use Modules\KamenTheme\Actions\SettingAction;
use Modules\KamenTheme\Entities\Setting\Hero;
use Modules\KamenTheme\Entities\Setting\Logo;
use Modules\KamenTheme\Entities\Setting\MediaSocial;
use Modules\KamenTheme\Entities\Setting\VissionMission;
use Modules\KamenTheme\Enums\MediaSocials;
use Modules\KamenTheme\Http\Requests\MediaSocialRequest;
use Modules\KamenTheme\Http\Requests\Setting\HeroRequest;
use Modules\KamenTheme\Http\Requests\Setting\LogoRequest;
use Modules\KamenTheme\Http\Requests\VissionMissionRequest;

class SettingController extends Controller
{
    public function index(): Response
    {
        return inertia('KamenTheme::setting/index', [
            'hero' => fn () => Hero::first(),
            'logo' => fn () => Logo::first(),
            'vission' => fn () => VissionMission::with('details')->first(),
            'media_socials' => fn () => MediaSocials::labels(),
            'media_socials_accounts' => fn () => MediaSocial::get(),
        ])->title(__('Pengaturan'));
    }

    public function hero(HeroRequest $request)
    {
        if (SettingAction::set(config('kamentheme.table.hero'), $request->validated())) {
            return back()->success(__('Berhasil mengatur halaman'));
        }

        return back()->error(__('Terjadi kesalahan saat mengatur halaman'));
    }

    public function logo(LogoRequest $request)
    {
        if (SettingAction::set('setting_logo', $request->validated())) {
            return back()->success(__('Berhasil mengatur logo'));
        }

        return back()->error(__('Terjadi kesalahan saat mengatur logo'));
    }

    public function vm(VissionMissionRequest $request)
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

    public function mediaSocial(MediaSocialRequest $request)
    {
        try {
            MediaSocial::truncate();

            $request->getFields()->map(function ($value) {
                MediaSocial::create([
                    'url' => $value['url'],
                    'name' => $value['name'],
                    'type' => $value['type'],
                ]);
            });

            return back()->success(__('Berhasil mengatur sosial media'));
        } catch (\Throwable $th) {
            return back()->error(__('Terjadi kesalahan saat mengatur sosial media'));
        }
    }
}
