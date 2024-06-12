<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('', [SiteController::class, 'homepage'])->name('site.homepage');
Route::get('doctors', [SiteController::class, 'ourDoctors'])->name('site.ourDoctors');
Route::get('services', [SiteController::class, 'services'])->name('site.services');
Route::get('services/{service}', [SiteController::class, 'showService']);
Route::get('our-happy-patients', [SiteController::class, 'ourHappyPatients'])->name('site.ohp');
Route::get('about-us', [SiteController::class, 'aboutUs'])->name('site.aboutUs');
