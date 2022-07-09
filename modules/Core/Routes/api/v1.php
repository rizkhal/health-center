<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\LfmController;

// WIP: AUTH FOR WEB AND API
Route::post('file/upload/lfm', LfmController::class);

Route::middleware('auth:api')->get('/core', function (Request $request) {
    return $request->user();
});
