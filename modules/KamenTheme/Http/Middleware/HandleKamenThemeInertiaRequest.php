<?php

namespace Modules\KamenTheme\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Modules\KamenTheme\Entities\Setting\Logo;
use Modules\KamenTheme\Entities\Setting\MediaSocial;
use Modules\Post\Entities\Category;

class HandleKamenThemeInertiaRequest extends Middleware
{
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'logo' => fn () => Logo::first(),
            'categories' => fn () => Category::withCount('posts')->get(),
            'media_socials' => fn () => MediaSocial::query()->get(),
        ]);
    }
}
