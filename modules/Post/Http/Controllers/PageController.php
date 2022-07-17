<?php

namespace Modules\Post\Http\Controllers;

use Inertia\Response;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function __invoke(): Response
    {
        return inertia('Post::page/index')->title(__('Atur Halaman'));
    }
}
