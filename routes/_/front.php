    
   <?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kasir\KasirHomeController;
use App\Http\Controllers\Kasir\KasirTransaksiController;

    

Route::group(['middleware' => 'auth:kasir'], function () {
    Route::get('/', [KasirHomeController::class, 'index']);
    Route::get('/transaksi', [KasirTransaksiController::class, 'index']);
    Route::get('/create', [KasirTransaksiController::class, 'create']);
    Route::get('/detail', [KasirTransaksiController::class, 'detail']);
});