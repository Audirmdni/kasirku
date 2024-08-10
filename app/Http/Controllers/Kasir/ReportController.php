<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

        $penjualan = Penjualan::whereBetween('tanggal_penjualan', [$startDate, $endDate])->get();

        return view('kasir.laporan.index', compact('penjualan', 'startDate', 'endDate'));
    }

    public function exportPdf(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

        $penjualan = Penjualan::whereBetween('tanggal_penjualan', [$startDate, $endDate])->get();

        $pdf = PDF::loadView('kasir.laporan.pdf', compact('penjualan', 'startDate', 'endDate'));
        return $pdf->download('sales_report.pdf');
    }
}
