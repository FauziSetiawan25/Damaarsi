<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PortfolioController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/catalog', [HomeController::class, 'catalog']);
Route::get('/portofolio', [HomeController::class, 'portofolio']);
Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/catalog/package/{id}', [CatalogController::class, 'showPackage'])->name('package.detail');
Route::get('/catalog/design/{id}', [CatalogController::class, 'showDesign'])->name('design.detail');

Route::get('/portofolio/detail/{id}', [PortfolioController::class, 'show'])->name('portofolio.detail');