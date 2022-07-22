<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\AnalyticController;
use Modules\Post\Http\Controllers\Api\CategoryJsonController;
use Modules\Post\Http\Controllers\PageController;
use Modules\Post\Http\Controllers\SettingController;

Route::middleware(['web', 'auth'])->prefix('post')->as('post.')->group(function () {
    Route::resource('/post', PostController::class);
    Route::resource('/category', CategoryController::class);

    Route::get('/google-analytic', AnalyticController::class)->name('google-analytic');

    Route::controller(PageController::class)->prefix('/page')->as('page.')->group(function () {
        Route::get('/', 'index')->name('index');

        // fasilitas
        Route::get('/facility', 'facility')->name('facility');
        Route::post('/facility/store', 'submitFacility')->name('submit.facility');

        // kepuasan masyarakat
        Route::get('/satisfaction', 'satisfaction')->name('satisfaction');
        Route::post('/satisfaction/store', 'submitSatisfaction')->name('submit.satisfaction');

        // pelayanan
        Route::get('/service', 'service')->name('service');
        Route::post('/service/store', 'submitService')->name('submit.service');

        // information
        Route::prefix('information')->as('information.')->group(function () {
            Route::get('/', 'information')->name('index');
            Route::post('/hipertency', 'hipertency')->name('hipertency');
            Route::post('/phbs', 'phbs')->name('phbs');
            Route::post('/service_schedules', 'service_schedules')->name('service_schedules');
            Route::post('/bpjs', 'bpjs')->name('bpjs');
            Route::post('/covid', 'covid')->name('covid');
        });
    });

    Route::get('/select/category', [CategoryJsonController::class, 'index']);
    Route::get('/subscriber', SubscriberController::class)->name('subscriber.index');
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
});
