<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Kasir\KasirHomeController;
use App\Http\Controllers\Kasir\KasirTransaksiController;
use App\Http\Controllers\AuthController;


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


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'LoginProses']);
Route::get('logout', [AuthController::class, 'logout']);

Route::prefix('admin')->group(function () {
    include "_/admin.php";
});





Route::prefix('kasir')->group(function () {
    include "_/front.php";
});

Route::get('Dashboard', [HomeController::class, 'showDashboard']);
Route::resource('Produk', ProdukController::class);

Route::get('Kategori', [KategoriController::class, 'index']);
Route::get('Kategori/create', [KategoriController::class, 'create']);
Route::post('Kategori', [KategoriController::class, 'store']);
