<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;

use App\Models\Sale;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;

class KasirTransaksiController extends Controller
{
    public function index()
    {
        $penjualan = Sale::all();
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
        $request->validate([
            'invoice_number' => 'required|unique:sales,invoice_number',
            'produk' => 'required|array',
            'produk.*.id' => 'required|exists:produk,id_produk',
            'produk.*.quantity' => 'required|integer|min:1',
        ], [
            'invoice_number.required' => 'Nomor Nota wajib diisi.',
            'invoice_number.unique' => 'Nomor Nota sudah ada.',
            'produk.required' => 'Produk wajib diisi.',
            'produk.array' => 'Format produk tidak valid.',
            'produk.*.id.required' => 'Produk wajib dipilih.',
            'produk.*.id.exists' => 'Produk yang dipilih tidak valid.',
            'produk.*.quantity.required' => 'Jumlah produk wajib diisi.',
            'produk.*.quantity.integer' => 'Jumlah produk harus berupa angka.',
            'produk.*.quantity.min' => 'Jumlah produk minimal 1.',
        ]);

    
        $totalAmount = 0;
        $saleDetails = [];
    
        foreach ($request->produk as $dataProduct) {
            $product = Produk::find($dataProduct['id']);
            if ($product == null) {
                return redirect()->back()->withErrors(['Produk dengan ID ' . $dataProduct['id'] . ' tidak ditemukan.']);
            }
    
            $quantity = $dataProduct['quantity'];
            $price = $product->harga_jual - ($product->harga_jual * ($product->diskon / 100));
            $totalAmount += $price * $quantity;
    
            $saleDetails[] = new DetailPenjualan([
                'id_produk' => $product->id_produk,
                'quantity' => $quantity,
                'price' => $price,
            ]);
    
            $product->decrement('stok', $quantity);
        }
    
        $sale = Sale::create([
            'invoice_number' => $request->invoice_number,
            'total_amount' => $totalAmount,
            'sale_date' => now(),
        ]);
    
        foreach ($saleDetails as $detail) {
            $detail->id_penjualan = $sale->id;
            $detail->save();
        }
    
        return redirect('kasir/transaksi')->with('success', 'Penjualan berhasil ditambahkan.');
    }



    public function show($id)
    {
        $penjualan = Sale::with('details')->findOrFail($id);

        // Mengembalikan view dengan data penjualan
      

            // return $penjualan;
        return view('kasir.transaksi.detail', compact('penjualan'));
    }

    
    public function getData($id)
    {
        $penjualan = Sale::with('details.produk')->findOrFail($id);
        return response()->json($penjualan);
    }

  
  
   public function destroy($id)
    {


    
        $penjualan = Sale::findOrFail($id);


        $penjualan->delete();

        return response()->json(['success' => 'Penjualan berhasil dihapus.']);
    }
}