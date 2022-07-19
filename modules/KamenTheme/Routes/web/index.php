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
    Route::controller(KamenThemeController::class)->group(function () {
        Route::get('/home', 'post')->name('home');
        // article
        Route::get('/article', 'article')->name('article');
        Route::get('/article/{post:slug}', 'showArticle')->name('show.article');
        // ...
        Route::get('/facility', 'facility')->name('facility');
        Route::get('/satisfaction', 'satisfaction')->name('satisfaction');
        Route::get('/service', 'service')->name('service');
        Route::get('/information', 'information')->name('information');
        // ...
        Route::prefix('/information')->as('information.')->group(function () {
            Route::get('/hipertency', 'hipertency')->name('hipertency');
            Route::get('/phbs', 'phbs')->name('phbs');
            Route::get('/service_schedules', 'service_schedules')->name('service_schedules');
            Route::get('/bpjs', 'bpjs')->name('bpjs');
            Route::get('/covid', 'covid')->name('covid');
        });
    });
});
