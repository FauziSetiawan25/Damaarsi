<?php

use App\Http\Middleware\TrackVisitor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PortofolioController;

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

Route::get('/', [HomeController::class, 'index'])->middleware(TrackVisitor::class);
Route::get('/catalog', [HomeController::class, 'catalog']);
Route::get('/portofolio', [HomeController::class, 'portofolio']);
Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/package', [CatalogController::class, 'listPackages'])->name('package');

Route::get('/catalog/package/{id}', [CatalogController::class, 'showPackage'])->name('package.detail');
Route::get('/catalog/design/{id}', [CatalogController::class, 'showDesign'])->name('design.detail');

Route::get('/portofolio/detail/{id}', [PortfolioController::class, 'show'])->name('portofolio.detail');

Route::controller(LoginController::class)->group(function () {
    Route::get('/admin', 'login')->name('login');
});

Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::controller(ProdukController::class)->group(function () {
        Route::get('/admin/produk', 'index')->name('admin.produk');
    });

    Route::controller(TestimoniController::class)->group(function () {
        Route::get('/admin/testimoni', 'index')->name('admin.testimoni');

    });


    Route::controller(PortofolioController::class)->group(function () {
        Route::get('/admin/portofolio', 'index')->name('admin.portofolio');
    });

    Route::controller(BerandaController::class)->group(function () {
        Route::get('/admin/beranda', 'index')->name('admin.beranda');
    });

    Route::get('/admin/customer', function () {
        return view('admin.customer');
    })->name('admin.customer');
});

Route::middleware('superadmin')->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dataadmin', 'show')->name('admin.dataadmin');
    });

    Route::controller(PengaturanController::class)->group(function () {
        Route::get('/admin/pengaturan', 'index')->name('admin.pengaturan');
    });
});
