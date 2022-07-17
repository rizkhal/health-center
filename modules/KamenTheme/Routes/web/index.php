<?php

use Illuminate\Support\Facades\Route;
use Modules\KamenTheme\Http\Controllers\KamenThemeController;
use Modules\KamenTheme\Http\Controllers\SettingController;
use Modules\KamenTheme\Http\Middleware\HandleKamenThemeInertiaRequest;

Route::prefix('dashboard')->as('dashboard.')->middleware('auth')->group(function () {
    Route::prefix('/kamen-theme')->as('kamen-theme.')->group(function () {
        Route::controller(SettingController::class)->prefix('/setting')->as('setting.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/hero', 'hero')->name('hero');
            Route::post('/logo', 'logo')->name('logo');
            Route::post('/media-social', 'mediaSocial')->name('media-social');
            Route::post('/vission-mission', 'vm')->name('vission-misson');
            Route::post('/address', 'address')->name('address');
        });
    });
});

Route::prefix('/post')->as('post.')->middleware(HandleKamenThemeInertiaRequest::class)->group(function () {
    Route::get('/', fn () => redirect()->route('post.home'));
    Route::get('/home', [KamenThemeController::class, 'post'])->name('home');
    Route::get('/article', [KamenThemeController::class, 'article'])->name('article');
    Route::get('/article/{post:slug}', [KamenThemeController::class, 'showArticle'])->name('show.article');
});
