    
   <?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kasir\KasirHomeController;
use App\Http\Controllers\Kasir\KasirTransaksiController;
use App\Http\Controllers\Kasir\ReportController;

    

Route::group(['middleware' => 'auth:kasir'], function () {
    Route::get('/', [KasirHomeController::class, 'index']);
    Route::get('/transaksi', [KasirTransaksiController::class, 'index']);


    Route::get('/transaksi/detail/{id}', [KasirTransaksiController::class, 'show']);

    Route::get('/transaksi/getdata/{id}', [KasirTransaksiController::class, 'getdata']);

    Route::get('kasir/transaksi/getdata/{id}', [KasirTransaksiController::class, 'getData'])->name('kasir.transaksi.getdata');
   
Route::post('/transaksi/store', [KasirTransaksiController::class, 'store']);

Route::get('/transaksi/create', [KasirTransaksiController::class, 'create'])->name('kasir.create');
Route::delete('/transaksi/{id}', [KasirTransaksiController::class, 'destroy']);


Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('reports/export', [ReportController::class, 'exportPdf'])->name('reports.export');

});

