<?php

use App\Http\Controllers\CMS\HomepageController;
use App\Http\Controllers\CMS\LoginController;
use App\Http\Controllers\CMS\ServicesController;
use Illuminate\Support\Facades\Route;

Route::prefix('site-admin')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login');
    Route::post('login', [LoginController::class, 'login'])->middleware('guest')->name('login.attempt');

    Route::middleware('auth')->group(function () {

        Route::prefix('homepage')->group(function () {
            Route::get('', [HomepageController::class, 'index'])->name('cms.homepage.show');
            Route::post('add-banner', [HomepageController::class, 'addBanner'])->name('cms.homepage.addBanner');
            Route::delete('remove-banner', [HomepageController::class, 'removeBanner'])->name('cms.homepage.removeBanner');

            Route::post('why-dentmate', [HomepageController::class, 'saveWhyDentmate']);

            Route::post('before-and-after', [HomepageController::class, 'addBeforeAndAfter'])->name('cms.homepage.addBeforeAndAfter');
            Route::delete('before-and-after', [HomepageController::class, 'deleteBeforeAndAfter'])->name('cms.homepage.deleteBeforeAndAfter');
        });

        Route::prefix('services')->group(function () {
            Route::get('', [ServicesController::class, 'index'])->name('cms.services.index');
            Route::post('add-service', [ServicesController::class, 'addService'])->name('cms.services.addService');
            Route::patch('update-service', [ServicesController::class, 'updateService'])->name('cms.services.updateService');
        });
    });
});