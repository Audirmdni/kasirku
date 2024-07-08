<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\BerandaController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\PengeluaranController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;


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

//ADMIN//
Route::get('Admin', [HomeController::class, 'showAdmin']);
Route::resource('Login', LoginController::class);
Route::resource('Register', RegisterController::class);

Route::prefix('Admin')->group(function () {
    Route::resource('Beranda', BerandaController::class);
    Route::resource('Kategori', KategoriController::class);
    Route::resource('Produk', ProdukController::class);
    Route::get('Produk/{id}/qrcode', [ProdukController::class, 'generateQRCode'])->name('admin.produk.qrcode');
    Route::get('Produk/search', [ProdukController::class, 'search'])->name('admin.produk.search');
    Route::resource('Supplier', SupplierController::class);
    Route::resource('Pengeluaran', PengeluaranController::class);
});
