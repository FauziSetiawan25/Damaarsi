<?php

use App\Http\Controllers\API\AdminApiController;
use App\Http\Controllers\API\CustomerApiController;
use App\Http\Controllers\API\LayananApiController;
use App\Http\Controllers\API\LoginApiController;
use App\Http\Controllers\API\MemilihApiController;
use App\Http\Controllers\API\PengaturanBannerApiController;
use App\Http\Controllers\API\PengunjungApiController;
use App\Http\Controllers\API\ProdukApiController;
use App\Http\Controllers\API\PortofolioApiController;
use App\Http\Controllers\API\TestimoniApiController;
use App\Http\Controllers\API\PengaturanWebApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum', 'role:superadmin'])->group(function () {
    Route::get('/admin', [AdminApiController::class, 'getAllAdmin']);
    Route::get('/admin/{id}', [AdminApiController::class, 'show']);
    Route::post('/admin', [AdminApiController::class, 'store']);
    Route::put('/admin/role/{id}', [AdminApiController::class, 'ubahRole']);
    Route::put('/admin/{id}', [AdminApiController::class, 'update']);
    Route::delete('/admin/{id}', [AdminApiController::class, 'destroy']);
});

Route::middleware(['auth:sanctum', 'role:admin,superadmin'])->group(function () {
    Route::post('/logout', [LoginApiController::class, 'logout']);

    Route::post('/produk', [ProdukApiController::class, 'store']);
    Route::put('/produk/recomen/{id}', [ProdukApiController::class, 'ubahRecomen']);
    Route::put('/produk/{id}', [ProdukApiController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukApiController::class, 'destroy']);

    Route::post('/portofolio', [PortofolioApiController::class, 'store']);
    Route::put('/portofolio/{id}', [PortofolioApiController::class, 'update']);
    Route::delete('/portofolio/{id}', [PortofolioApiController::class, 'destroy']);

    Route::post('/testimoni', [TestimoniApiController::class, 'store']);
    // Route::put('/testimoni/{id}', [TestimoniApiController::class, 'ubahStatus']);
    Route::delete('/testimoni/{id}', [TestimoniApiController::class, 'destroy']);

    Route::put('/pengaturan/{id}', [PengaturanWebApiController::class, 'updatePengaturan']);

    Route::put('/banner/status/{id}', [PengaturanBannerApiController::class, 'ubahStatus']);
    Route::put('/banner/{id}', [PengaturanBannerApiController::class, 'updateBanner']);

    Route::get('/customer', [CustomerApiController::class, 'getAllCustomer']);

    Route::put('/layanan/{id}', [LayananApiController::class, 'updateLayanan']);

    Route::put('/memilih/{id}', [MemilihApiController::class, 'updateMemilih']);
});



// Route::middleware(['auth:sanctum'])->group(function () {
    
// });


Route::post('/login', [LoginApiController::class, 'authenticate']);

Route::get('/produk', [ProdukApiController::class, 'getAllProducts']);
Route::get('/produk/recomen', [ProdukApiController::class, 'getRecomenProducts']);
Route::get('/produk/count', [ProdukApiController::class, 'getProductCount']);
Route::get('/produk/{id}', [ProdukApiController::class, 'show']);


Route::get('/portofolio', [PortofolioApiController::class, 'getAllPortofolio']);
Route::get('/portofolio/{id}', [PortofolioApiController::class, 'show']);

Route::get('/testimoni', [TestimoniApiController::class, 'getAllTestimoni']);
Route::get('/testimoni/{id}', [TestimoniApiController::class, 'show']);

Route::get('/pengaturan', [PengaturanWebApiController::class, 'getAllPWeb']);
Route::get('/pengaturan/{keterangan}', [PengaturanWebApiController::class, 'showByKeterangan']);

Route::get('/banner', [PengaturanBannerApiController::class, 'getAllPBanner']);
Route::get('/banner/active', [PengaturanBannerApiController::class, 'getBannerActive']);
Route::get('/banner/{id}', [PengaturanBannerApiController::class, 'show']);

Route::get('/layanan', [LayananApiController::class, 'getAllLayanan']);

Route::get('/memilih', [MemilihApiController::class, 'getAllMemilih']);

Route::post('/customer/add', [CustomerApiController::class, 'form']);
Route::get('/customer/count', [CustomerApiController::class, 'getCustomerCount']);

Route::get('/visitor/count', [PengunjungApiController::class, 'getVisitorCount']);
Route::get('/visitor/stats', [PengunjungApiController::class, 'getVisitorStats']);