<?php

namespace Modules\Post\Http\Controllers;

use Analytics;
use Illuminate\Routing\Controller;
use Inertia\Response;
use Spatie\Analytics\Period;

class AnalyticController extends Controller
{
    public function __invoke(): Response
    {
        return inertia('Post::analytic/index', [
            'analytics' => Analytics::fetchVisitorsAndPageViews(Period::days(7)),
        ])->title(__('Google Analytic'));
    }
}
