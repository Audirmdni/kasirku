<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KasirController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PengeluaranController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\UserController;

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);
    Route::get('produk/{id}/qrcode', [ProdukController::class, 'generateQRCode'])->name('admin.produk.qrcode');
    Route::get('produk/search', [ProdukController::class, 'search'])->name('admin.produk.search');
    Route::resource('supplier', SupplierController::class);
    Route::resource('pengeluaran', PengeluaranController::class);

    Route::resource('kasir', KasirController::class);
    Route::resource('user', UserController::class);
});
