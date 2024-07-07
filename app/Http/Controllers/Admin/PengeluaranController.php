<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Pengeluaran;

class PengeluaranController extends Controller
{
    public function index()
    {
        $data['pengeluarans'] = Pengeluaran::all(); // Mengubah pengeluaran menjadi pengeluarans
        return view('Admin.pengeluaran.index', $data);
    }

    public function store(Request $request)
    {
        $pengeluaran = new Pengeluaran();
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->nominal = $request->nominal;
        $pengeluaran->save();

        return redirect('Admin/Pengeluaran')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data['pengeluaran'] = Pengeluaran::find($id);
        return view('Admin.pengeluaran.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->nominal = $request->nominal;
        $pengeluaran->save();

        return redirect('Admin/Pengeluaran')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
