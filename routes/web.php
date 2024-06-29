<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\BerandaController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;


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

Route::get('Admin', [HomeController::class, 'showAdmin']);

Route::get('Login', function () {
    return view('components.login');
});
Route::resource('/Admin/Beranda', BerandaController::class);
Route::resource('Admin/Kategori', KategoriController::class);

Route::resource('Admin/Produk', ProdukController::class);
