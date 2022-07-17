<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\Api\CategoryJsonController;
use Modules\Post\Http\Controllers\PageController;
use Modules\Post\Http\Controllers\SettingController;

Route::middleware(['web', 'auth'])->prefix('post')->as('post.')->group(function () {
    Route::resource('/post', PostController::class);
    Route::resource('/category', CategoryController::class);

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

        // informasi
        Route::get('/information', 'information')->name('information');
        Route::post('/information/store', 'submitInformation')->name('submit.information');
    });

    Route::get('/select/category', [CategoryJsonController::class, 'index']);
    Route::get('/subscriber', SubscriberController::class)->name('subscriber.index');
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
});
