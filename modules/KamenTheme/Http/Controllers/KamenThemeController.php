<?php

namespace Modules\KamenTheme\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Modules\Post\Entities\Post;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Builder;
use Modules\KamenTheme\Entities\Setting\Hero;
use Modules\KamenTheme\Entities\Setting\Logo;
use Modules\KamenTheme\Entities\Setting\VissionMission;

class KamenThemeController extends Controller
{
    public function post(): Response
    {
        return Inertia::render('KamenTheme::index', [
            'hero' => Hero::first(),
            'logo' => Logo::first(),
            'vission' => VissionMission::with('details')->first(),
        ])->title(__('Halaman Utama'));
    }

    public function article(Request $request): Response
    {
        return Inertia::render('KamenTheme::article/index', [
            'filters' => $request->all(['category']),
            'articles' => fn () => Post::query()
                ->with(['author', 'category', 'image'])
                ->when(
                    $request->get('category'),
                    fn (Builder $query, $category) => $query->whereHas(
                        'category',
                        fn ($query) => $query->whereName($category)
                    )
                )
                ->latest()->paginate(10),
        ])->title(__('Halaman Artikel'));
    }

    public function showArticle(Request $request, Post $post): Response
    {
        $post->readingCounter($request->ip());

        $post->load(['author', 'category', 'image']);

        return Inertia::render('KamenTheme::article/show', [
            'article' => fn () => $post,
        ])->title($post->title);
    }
}
