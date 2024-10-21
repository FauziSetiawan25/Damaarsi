<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class,'index'])-> name('admin.index');


Route::get('/admin/dashboard', [AdminController::class,'dashboard'])-> name('admin.dashboard');

Route::get('/admin/produk', [ProdukController::class,'index'])-> name('admin.produk');

