<?php

namespace Modules\Post\Http\Controllers;

use Inertia\Response;
use Spatie\Analytics\Period;
use Analytics;
use Illuminate\Routing\Controller;

class AnalyticController extends Controller
{
    public function __invoke(): Response
    {
        return inertia('Post::analytic/index', [
            'analytics' => Analytics::fetchVisitorsAndPageViews(Period::days(7)),
        ])->title(__('Google Analytic'));
    }
}
