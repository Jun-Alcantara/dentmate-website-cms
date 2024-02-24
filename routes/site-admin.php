<?php

use App\Http\Controllers\CMS\HomepageController;
use App\Http\Controllers\CMS\LoginController;
use App\Models\HomepageBanners;
use Illuminate\Support\Facades\Route;

Route::prefix('site-admin')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login.index');
    Route::post('login', [LoginController::class, 'login'])->middleware('guest')->name('login.attempt');

    Route::middleware('auth')->group(function () {
        Route::get('homepage', [HomepageController::class, 'index'])->name('cms.homepage.show');
        Route::post('homepage/add-banner', [HomepageController::class, 'addBanner'])->name('cms.homepage.addBanner');
        Route::delete('homepage/remove-banner', [HomepageController::class, 'removeBanner'])->name('cms.homepage.removeBanner');
    });
});