<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\PagesController;
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

Route::group(['prefix' => 'gallery'], function () {
    Route::get('/{gallery}', GalleryController::class . '@show');
});
