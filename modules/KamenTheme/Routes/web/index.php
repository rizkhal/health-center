<?php

use Illuminate\Support\Facades\Route;
use Modules\KamenTheme\Http\Controllers\SettingController;
use Modules\KamenTheme\Http\Controllers\KamenThemeController;
use Modules\KamenTheme\Http\Controllers\Setting\HeroController;
use Modules\KamenTheme\Http\Controllers\Setting\LogoController;
use Modules\KamenTheme\Http\Middleware\HandleKamenThemeInertiaRequest;

Route::prefix('dashboard')->as('dashboard.')->group(function () {
    Route::prefix('/kamen-theme')->as('kamen-theme.')->group(function () {
        Route::prefix('/setting')->as('setting.')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::post('/hero', HeroController::class)->name('hero');
            Route::post('/logo', LogoController::class)->name('logo');
        });
    });
});

Route::prefix('/post')->as('post.')->middleware(HandleKamenThemeInertiaRequest::class)->group(function () {
    Route::get('/', fn () => redirect()->route('post.home'));
    Route::get('/home', [KamenThemeController::class, 'post'])->name('home');
    Route::get('/video', [KamenThemeController::class, 'video'])->name('video');
});
