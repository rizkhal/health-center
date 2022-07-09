<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\LoginWebController;

Route::prefix('auth')->group(function () {
    Route::get('login', [LoginWebController::class, 'view'])->name('login')->middleware('guest');
    Route::post('login', [LoginWebController::class, 'login'])->name('login.store')->middleware('guest');
    Route::delete('logout', [LoginWebController::class, 'logout'])->name('logout');
});
