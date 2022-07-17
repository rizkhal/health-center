<?php

namespace Modules\Post\Http\Controllers;

use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Service;
use Modules\Post\Entities\Facility;
use Modules\Post\Entities\Information;
use Modules\Post\Entities\Satisfaction;

class PageController extends Controller
{
    public function index(): Response
    {
        return inertia('Post::page/index', [
            'pages' => $this->createCards(),
        ])->title(__('Atur Halaman'));
    }

    public function facility(): Response
    {
        return inertia('Post::page/facility', [
            'facility' => Facility::first(),
        ])->title(__('Fasilitas'));
    }

    public function submitFacility(Request $request)
    {
        $request->validate([
            'content' => ['required'],
        ]);

        try {
            if ($m = Facility::first()) {
                $m->update($request->all());
            } else {
                Facility::create($request->all());
            }

            return back()->success(__('Halaman berhasil diatur'));
        } catch (\Throwable $th) {
            return back()->error(__('Terjadi kesalahan'));
        }
    }

    public function satisfaction(): Response
    {
        return inertia('Post::page/satisfaction', [
            'satisfaction' => Satisfaction::first(),
        ])->title(__('Kepuasan Masyarakat'));
    }

    public function submitSatisfaction(Request $request)
    {
        $request->validate([
            'content' => ['required'],
        ]);

        try {
            if ($m = Satisfaction::first()) {
                $m->update($request->all());
            } else {
                Satisfaction::create($request->all());
            }

            return back()->success(__('Halaman berhasil diatur'));
        } catch (\Throwable $th) {
            return back()->error(__('Terjadi kesalahan'));
        }
    }

    public function service()
    {
        return inertia('Post::page/service', [
            'service' => Service::first(),
        ])->title(__('Pelayanan'));
    }

    public function submitService(Request $request)
    {
        $request->validate([
            'content' => ['required'],
        ]);

        try {
            if ($m = Service::first()) {
                $m->update($request->all());
            } else {
                Service::create($request->all());
            }

            return back()->success(__('Halaman berhasil diatur'));
        } catch (\Throwable $th) {
            return back()->error(__('Terjadi kesalahan'));
        }
    }

    public function information()
    {
        return inertia('Post::page/information', [
            'information' => Information::first(),
        ])->title(__('Pelayanan'));
    }

    public function submitInformation(Request $request)
    {
        $request->validate([
            'content' => ['required'],
        ]);

        try {
            if ($m = Information::first()) {
                $m->update($request->all());
            } else {
                Information::create($request->all());
            }

            return back()->success(__('Halaman berhasil diatur'));
        } catch (\Throwable $th) {
            return back()->error(__('Terjadi kesalahan'));
        }
    }

    private function createCards(): array
    {
        return [
            __('Fasilitas') => [
                'icon' => 'XIcon',
                'url' => route('dashboard.post.page.facility'),
                'text' => 'Kelola Fasilitas',
            ],
            __('Kepuasan Masyarakat') => [
                'icon' => 'XIcon',
                'url' => route('dashboard.post.page.satisfaction'),
                'text' => 'Kelola Fasilitas',
            ],
            __('Pelayanan') => [
                'icon' => 'XIcon',
                'url' => route('dashboard.post.page.service'),
                'text' => 'Kelola Fasilitas',
            ],
            __('Informasi') => [
                'icon' => 'XIcon',
                'url' => route('dashboard.post.page.information'),
                'text' => 'Kelola Fasilitas',
            ],
        ];
    }
}
