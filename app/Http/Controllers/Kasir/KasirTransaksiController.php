<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;

use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;

class KasirTransaksiController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('kasir.transaksi.index', compact('penjualan'));
    }

    public function create()
    {
        $data['produk'] = Produk::all();
      
        // return $data;   
        
        return view('kasir.transaksi.create', $data);
    }

   
    
    public function store(Request $request)
    {
        //  Validate the request
        $request->validate([
            'no_nota' => 'required|unique:penjualan,no_nota',
            'produk' => 'required|array',
             'produk.*.id' => 'required|exists:produk,id_produk',
            'produk.*.quantity' => 'required|integer|min:1',
        ], [
            'no_nota.required' => 'Nomor Nota wajib diisi.',
            'no_nota.unique' => 'Nomor Nota sudah ada.',
            'produk.required' => 'Produk wajib diisi.',
            'produk.array' => 'Format produk tidak valid.',
            'produk.*.id.required' => 'Produk wajib dipilih.',
            'produk.*.id.exists' => 'Produk yang dipilih tidak valid.',
            'produk.*.quantity.required' => 'Jumlah produk wajib diisi.',
            'produk.*.quantity.integer' => 'Jumlah produk harus berupa angka.',
            'produk.*.quantity.min' => 'Jumlah produk minimal 1.',
        ]);
    
        $totalHarga = 0;
        $penjualanDetail = [];
    
        foreach ($request->produk as $dataProduk) {
            $product = Produk::find($dataProduk['id']);
            $total_item = $dataProduk['quantity'];
            $harga = $product->harga_jual - ($product->harga_jual * ($product->diskon / 100));
            $totalHarga += $harga * $total_item;
    
            $penjualanDetail[] = new DetailPenjualan([
                'id_produk' => $product->id_produk,
                'total_item' => $total_item,
                'harga' => $harga,
            ]);
    
            $product->decrement('stok', $total_item);
        }
    
        $penjualan = Penjualan::create([
            'no_nota' => $request->no_nota,
            'total_harga' => $totalHarga,
            'tanggal_penjualan' => now(),
            'uang_bayar' => $request->uang_bayar,
            'kembalian' => $request->kembalian,
        ]);
    
        foreach ($penjualanDetail as $detail) {
            $detail->id_penjualan = $penjualan->id_penjualan;
            $detail->save();
        }
    
        return redirect('kasir/transaksi')->with('success', 'Penjualan berhasil ditambahkan.');
    }
    


    public function show($id)
    {
        $penjualan = Penjualan::with('detailPenjualan')->findOrFail($id);

         
        return view('kasir.transaksi.detail', compact('penjualan'));
    }

    
    public function getData($id)
    {
        $penjualan = Penjualan::with('detailPenjualan.produk')->findOrFail($id);
        return response()->json($penjualan);
    }

  
  
    public function destroy($id_penjualan)
{
    // Find the Penjualan record by ID with related DetailPenjualan records
    $penjualan = Penjualan::with('detailPenjualan')->findOrFail($id_penjualan);

    // Loop through each DetailPenjualan record to restore the stock of the product
    foreach ($penjualan->detailPenjualan as $detail) {
        // Restore the stock of the product
        $product = Produk::find($detail->id_produk);

        if ($product) {
            // Ensure total_item is numeric
            if (is_numeric($detail->total_item)) {
                $product->increment('stok', $detail->total_item);
            } else {
                    // Log::error('Non-numeric value for total_item: ' . $detail->total_item);
            }
        }
    }

    // Delete the associated DetailPenjualan records
    $penjualan->detailPenjualan()->delete();

    // Delete the Penjualan record
    $penjualan->delete();

    // Redirect back with a success message
    return redirect('kasir/transaksi')->with('danger', 'Data Berhasil Di hapus');;
}

    
}