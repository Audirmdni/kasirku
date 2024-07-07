<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Kasir\KasirHomeController;
use App\Http\Controllers\Kasir\KasirTransaksiController;


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

Route::get('login', function () {
    return view('auth.login');
});
Route::get('register', function () {
    return view('auth.register');
});

Route::get('Dashboard', [HomeController::class, 'showDashboard']);

// Route::get('Produk', [ProdukController::class, 'index']);
// Route::get('Produk/create', [ProdukController::class, 'create']);
// Route::post('Produk', [ProdukController::class, 'store']);

Route::resource('Produk', ProdukController::class);


Route::get('Kategori', [KategoriController::class, 'index']);
Route::get('Kategori/create', [KategoriController::class, 'create']);
Route::post('Kategori', [KategoriController::class, 'store']);


Route::prefix('kasir')->group(function(){
        Route::get('/', [KasirHomeController::class, 'index']);
        Route::get('/transaksi', [KasirTransaksiController::class, 'index']);
        Route::get('/create', [KasirTransaksiController::class, 'create']);
        Route::get('/detail', [KasirTransaksiController::class, 'detail']);
});