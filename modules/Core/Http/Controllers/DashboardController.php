<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Response;
use Modules\Post\Entities\Post;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        return inertia('Core::dashboard', [
            'articles_count' => Post::query()->select('id')->count(),
            'all_read_articles_couunt' => Post::query()->select(DB::raw('SUM(views_count) as articles_reading_total'))->get()[0]->articles_reading_total,
        ])->title(__('Dashboard'));
    }
}
