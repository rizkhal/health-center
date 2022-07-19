<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Response;
use Modules\Post\Entities\Bpjs;
use Modules\Post\Entities\Covid;
use Modules\Post\Entities\Facility;
use Modules\Post\Entities\Hipertency;
use Modules\Post\Entities\Phbs;
use Modules\Post\Entities\Satisfaction;
use Modules\Post\Entities\Service;
use Modules\Post\Entities\ServiceSchedule;

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
        return $this->submit(new Facility(), $request);
    }

    public function satisfaction(): Response
    {
        return inertia('Post::page/satisfaction', [
            'satisfaction' => Satisfaction::first(),
        ])->title(__('Kepuasan Masyarakat'));
    }

    public function submitSatisfaction(Request $request)
    {
        return $this->submit(new Satisfaction(), $request);
    }

    public function service()
    {
        return inertia('Post::page/service', [
            'service' => Service::first(),
        ])->title(__('Pelayanan'));
    }

    public function submitService(Request $request)
    {
        return $this->submit(new Service(), $request);
    }

    public function information()
    {
        return inertia('Post::page/information/index', [
            'hipertency' => Hipertency::first(),
            'phbs' => Phbs::first(),
            'bpjs' => Bpjs::first(),
            'covid' => Covid::first(),
            'service_schedules' => ServiceSchedule::first(),
        ])->title(__('Pelayanan'));
    }

    public function hipertency(Request $request)
    {
        return $this->submit(new Hipertency(), $request);
    }

    public function phbs(Request $request)
    {
        return $this->submit(new Phbs(), $request);
    }

    public function service_schedules(Request $request)
    {
        return $this->submit(new ServiceSchedule(), $request);
    }

    public function bpjs(Request $request)
    {
        return $this->submit(new Bpjs(), $request);
    }

    public function covid(Request $request)
    {
        return $this->submit(new Covid(), $request);
    }

    private function submit($model, Request $request)
    {
        $request->validate([
            'content' => ['required'],
        ]);

        try {
            if ($m = $model::first()) {
                $m->update($request->all());
            } else {
                $model::create($request->all());
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
                'url' => route('dashboard.post.page.information.index'),
                'text' => 'Kelola Fasilitas',
            ],
        ];
    }
}
