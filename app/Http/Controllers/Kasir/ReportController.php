<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sale; 
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

        $sales = Sale::whereBetween('sale_date', [$startDate, $endDate])->get();

        return view('kasir.laporan.index', compact('sales', 'startDate', 'endDate'));
    }

    public function exportPdf(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

        $sales = Sale::whereBetween('sale_date', [$startDate, $endDate])->get();

        $pdf = PDF::loadView('kasir.laporan.pdf', compact('sales', 'startDate', 'endDate'));
        return $pdf->download('sales_report.pdf');
    }
}
