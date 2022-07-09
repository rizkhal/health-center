<?php

use Illuminate\Support\Facades\Route;

$config = config('lfm');

Route::group(['prefix' => $config['prefix_route'], 'middleware' => $config['middleware']], function () {
    if (class_exists("\UniSharp\LaravelFilemanager\Lfm")) {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    }
});
