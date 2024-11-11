<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TestimoniController;
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



Route::controller(LoginController::class)->group(function() {

    Route::get('/admin', 'login')->name('login');

    Route::post('/authenticate', 'authenticate')->name('authenticate');

    Route::post('/logout', 'logout')->name('logout');
 });

 Route::middleware('admin')->group(function () {
    
    Route::get('/admin/dashboard', [AdminController::class,'dashboard'])-> name('admin.dashboard');

    Route::get('/admin/produk', [ProdukController::class,'index'])-> name('admin.produk');

    Route::get('/admin/testimoni', [TestimoniController::class,'index'])-> name('admin.testimoni');

    Route::get('/addtesti', [TestimoniController::class,'create'])-> name('admin.addtesti');

    Route::get('/admin/portofolio', [PortofolioController::class,'index'])-> name('admin.portofolio');

    Route::get('/admin/customer', function () {return view('admin.customer');})-> name('admin.customer');

    Route::get('/admin/dataadmin', [AdminController::class,'show'])-> name('admin.dataadmin');

    Route::get('/admin/pengaturan', [PengaturanController::class,'index'])-> name('admin.pengaturan');
});
