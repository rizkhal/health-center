<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\SettingController;
use Modules\Core\Http\Controllers\Backup\BackupController;

Route::middleware('auth')->prefix('dashboard')->as('dashboard.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/setting', SettingController::class)->name('setting');
    Route::prefix('/backup')->as('backup.')->group(function () {
        Route::controller(BackupController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('create', 'create')->name('create'); // manual backup
            Route::get('/download', 'download')->name('download');
            Route::post('/destroy', 'destroy')->name('destroy');
        });
    });
});
