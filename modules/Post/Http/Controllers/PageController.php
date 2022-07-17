<?php

namespace Modules\Post\Http\Controllers;

use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Facility;

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
            if ($f = Facility::first()) {
                $f->update($request->all());
            } else {
                Facility::create($request->all());
            }

            return back()->success(__('Berhasil mengatur fasilitas'));
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
                'text' => 'Kelola Fasilitas'
            ],
            __('Kepuasan Masyarakat') => [
                'icon' => 'XIcon',
                'url' => route('dashboard.post.page.facility'),
                'text' => 'Kelola Fasilitas'
            ],
            __('Pelayanan') => [
                'icon' => 'XIcon',
                'url' => route('dashboard.post.page.facility'),
                'text' => 'Kelola Fasilitas'
            ],
            __('Informasi') => [
                'icon' => 'XIcon',
                'url' => route('dashboard.post.page.facility'),
                'text' => 'Kelola Fasilitas'
            ],
        ];
    }
}
