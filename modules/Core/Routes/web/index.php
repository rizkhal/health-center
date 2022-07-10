<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\SettingController;
use Modules\Core\Providers\RouteServiceProvider;

Route::middleware('auth')->prefix('dashboard')->as('dashboard.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/setting', SettingController::class)->name('setting');
});
