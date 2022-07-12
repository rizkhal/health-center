<?php

namespace Modules\KamenTheme\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class VissionMissionController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'vission' => ['required'],
            'mission' => ['required'],
        ]);

        try {

            // 

        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
