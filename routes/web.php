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

Route::get('/addtesti', [TestimoniController::class, 'create'])->name('testimoni.add');
Route::post('/addtesti', [TestimoniController::class, 'store'])->name('testimoni.store');

Route::controller(LoginController::class)->group(function () {
    Route::get('/admin', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::controller(ProdukController::class)->group(function () {
        Route::get('/admin/produk', 'index')->name('admin.produk');
        Route::post('/admin/produk', 'store')->name('admin.produk.store');
        Route::delete('/admin/produk/{id}', 'destroy')->name('admin.produk.destroy');
        Route::put('/admin/produk/{id}', 'update')->name('admin.produk.update');
    });

    Route::controller(TestimoniController::class)->group(function () {
        Route::get('/admin/testimoni', 'index')->name('admin.testimoni');
        Route::post('/admin/testimoni/{id}', 'ubahStatus')->name('admin.testimoni.ubahStatus');
        Route::get('/addtesti', 'create')->name('testimoni.add');
        Route::post('/addtesti', 'store')->name('testimoni.store');
        Route::delete('/testimoni/{id}', 'destroy')->name('admin.testimoni.destroy');

    });


    Route::controller(PortofolioController::class)->group(function () {
        Route::get('/admin/portofolio', 'index')->name('admin.portofolio');
        Route::delete('/admin/portofolio/{id}', 'destroy')->name('admin.portofolio.destroy');
        Route::put('/admin/portofolio/{id}', 'update')->name('admin.portofolio.update');
        Route::post('/admin/portofolio', 'store')->name('admin.portofolio.store');
    });

    Route::controller(BerandaController::class)->group(function () {
        Route::get('/admin/beranda', 'index')->name('admin.beranda');
        // Route::put('/admin/beranda/{id}', 'updateLayanan')->name('admin.layanan.update');
        // Route::put('/admin/beranda/alasan/{id}', 'updateAlasan')->name('admin.memilih.update');
    });

    Route::get('/admin/customer', function () {
        return view('admin.customer');
    })->name('admin.customer');
});

Route::middleware('superadmin')->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dataadmin', 'show')->name('admin.dataadmin');
        // Route::post('/admin/dataadmin/{id}', 'ubahrole')->name('admin.ubahrole');
        // Route::delete('/admin/dataadmin/{id}', 'destroy')->name('admin.destroy');
        // Route::put('/admin/dataadmin/{id}', 'update')->name('admin.update');
        // Route::post('/admin/dataadmin', 'store')->name('admin.store');
    });

    Route::controller(PengaturanController::class)->group(function () {
        Route::get('/admin/pengaturan', 'index')->name('admin.pengaturan');
        // Route::put('/admin/pengaturan/{id}', 'updatePengaturan')->name('admin.pengaturan.update');
        // Route::post('/admin/pengaturan/banner/{id}', 'ubahStatus')->name('admin.banner.ubahStatus');
        // Route::put('/admin/pengaturan/banner/{id}', 'updateBanner')->name('admin.banner.update');
    });
});
