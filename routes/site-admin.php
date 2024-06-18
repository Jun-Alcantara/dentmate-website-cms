<?php

use App\Http\Controllers\CMS\AboutUsController;
use App\Http\Controllers\CMS\BannersController;
use App\Http\Controllers\CMS\BranchesController;
use App\Http\Controllers\CMS\HomepageController;
use App\Http\Controllers\CMS\LoginController;
use App\Http\Controllers\CMS\OurDoctorsController;
use App\Http\Controllers\CMS\OurHappyPatientsController;
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
            Route::post('update-service', [ServicesController::class, 'updateService'])->name('cms.services.updateService');
            Route::delete('delete-service', [ServicesController::class, 'deleteService'])->name('cms.services.deleteService');

            Route::patch('update-other-services', [ServicesController::class, 'updateOtherServices'])->name('cms.otherServices.update');
        });

        Route::prefix('branches')->group(function () {
            Route::get('', [BranchesController::class, 'index'])->name('cms.branches.index');
            Route::post('', [BranchesController::class, 'create'])->name('cms.branches.create');
            Route::delete('', [BranchesController::class, 'delete'])->name('cms.branches.delete');
            Route::post('update', [BranchesController::class, 'update'])->name('cms.branches.update');
        });

        Route::prefix('doctors')->group(function () {
            Route::get('', [OurDoctorsController::class, 'index'])->name('cms.ourdoctors.index');
            Route::post('add-banner', [OurDoctorsController::class, 'addBanner'])->name('cms.ourdoctos.addBanner');
            Route::delete('delete-banner', [OurDoctorsController::class, 'deleteBanner'])->name('cms.ourdoctos.deleteBanner');
            Route::post('update-doc-justin', [OurDoctorsController::class, 'updateDocJustin'])->name('cms.ourdoctors.updateDocJustin');
            Route::post('add-doctor', [OurDoctorsController::class, 'addDoctor'])->name('cms.ourdoctors.addDoctor');
            Route::delete('delete-doctor', [OurDoctorsController::class, 'deleteDoctor'])->name('cms.ourdoctors.deleteDoctor');
            Route::post('update-doctor', [OurDoctorsController::class, 'updateDoctor'])->name('cms.ourdoctors.updateDoctor');
        });

        Route::prefix('our-happy-patients')->group(function () {
            Route::get('', [OurHappyPatientsController::class, 'index'])->name('cms.ohp.index');
            Route::post('create-testimonial', [OurHappyPatientsController::class, 'createTestimonial'])->name('cms.ohp.create');
            Route::post('update-testimonial', [OurHappyPatientsController::class, 'updateTestimonial'])->name('cms.ohp.update');
            Route::delete('delete-testimonial', [OurHappyPatientsController::class, 'deleteTestimonial'])->name('cms.ohp.delete');
            Route::get('{testimonial}/images', [OurHappyPatientsController::class, 'bannerImages'])->name('cms.ohp.show');
        });

        Route::prefix('about-us')->group(function () {
            Route::get('', [AboutUsController::class, 'index'])->name('cms.aboutus.index');
            Route::post('update-our-story', [AboutUsController::class, 'updateOurStory'])->name('cms.ourStory.updateOurStory');
            Route::post('update-founders', [AboutUsController::class, 'updateFounders'])->name('cms.founders.updateFounders');
            Route::post('create-personel', [AboutUsController::class, 'createPersonel'])->name('cms.aboutUs.createPersonel');
            Route::delete('delete-personel', [AboutUsController::class, 'deletePersonel'])->name('cms.aboutUs.deletePersonel');
        });

        Route::prefix('banners')->group(function () {
            Route::post('add-banner', [BannersController::class, 'addBanner'])->name('cms.banners.addBanner');
            Route::delete('delete-banner', [BannersController::class, 'deleteBanner'])->name('cms.banners.deleteBanner');
        });
    });
});