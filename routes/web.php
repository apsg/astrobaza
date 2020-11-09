<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\OpeningHoursController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', PagesController::class . '@home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/godziny', PagesController::class . '@hours')->name('hours');
Route::get('/kontakt', PagesController::class . '@contact')->name('contact');
Route::get('/galeria', PagesController::class . '@gallery')->name('gallery');
Route::get('/lang/{lang}', LangController::class . '@change')->name('locale');

Route::get('/gallery/{gallery}', GalleryController::class . '@show')->name('gallery.show');

Route::group(['prefix' => 'gallery', 'middleware' => 'auth'], function () {
    Route::post('/', GalleryController::class . '@store')->name('gallery.store');
    Route::post('/{gallery}', GalleryController::class . '@update')->name('gallery.update');
    Route::delete('/{gallery}', GalleryController::class . '@destroy')->name('gallery.delete');
    Route::post('/{gallery}/images', GalleryController::class . '@uploadImages')
        ->name('gallery.images.store');
    Route::delete('/{gallery}/images/{uuid}', GalleryController::class . '@deleteImage')
        ->name('gallery.images.destroy');
});

Route::group(['prefix' => 'openings'], function () {
    Route::post('/', OpeningHoursController::class . '@store')->name('openings.store');
    Route::delete('/{opening}', OpeningHoursController::class . '@destroy')->name('openings.destroy');
});

Route::get('weather', WeatherController::class . '@getWeather');
