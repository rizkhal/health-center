<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Routing\Controller;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        return inertia('Core::dashboard')->title(__('Dashboard'));
    }
}
