<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calculator', [CalculatorController::class, "showForm"] )->name("form");
Route::post( '/calculator/result', [CalculatorController::class, "showResult"])->name("result");

Route::post('owners/search', [OwnerController::class, 'search'])->name('owners.search');

Route::resource("cars", CarController::class)->middleware('auth');

Route::resource("owners", \App\Http\Controllers\OwnerController::class)->middleware('admin')->except(['index']);
Route::resource("cars", CarController::class)->middleware('admin')->except(['index']);

Route::get("/owners",[\App\Http\Controllers\OwnerController::class, "index"])->name("owners.index")->middleware('replace');
Route::get("/cars",[\App\Http\Controllers\CarController::class, "index"])->name("cars.index")->middleware('replace');
Route::get("/setLanguage/{lang}", [LanguageController::class, 'setLanguage'])->name("lang");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

