<?php

use Illuminate\Support\Facades\Route;
use Modules\KamenTheme\Http\Controllers\KamenThemeController;

// KAMEN THEME  
Route::get('/', [KamenThemeController::class, 'post']);
