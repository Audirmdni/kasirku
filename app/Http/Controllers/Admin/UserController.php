<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data['list_user'] = User::all();

        return view('Admin.User.index', $data);
    }

    public function create()
    {
        // Tambahkan logika untuk menampilkan form tambah pengguna jika diperlukan
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Enkripsi password
        ]);

        $user = new User();
        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password')); // Enkripsi password
        $user->handleUploadPoto();
        $user->save();

        return redirect('admin/user')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        // Tambahkan logika untuk menampilkan detail pengguna jika diperlukan
    }

    public function edit(string $id)
    {
        // Tambahkan logika untuk menampilkan form edit pengguna jika diperlukan
    }

    public function update(Request $request, $user)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user,
            'password' => 'nullable|string|min:8|confirmed', // Enkripsi password
        ]);

        $user = User::find($user);
        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password')); // Enkripsi password
        }
        $user->handleUploadPoto();

        $user->save();

        return redirect('admin/user')->with('success', 'Data berhasil diubah');
    }

    public function destroy($user)
    {
        $user = User::find($user);
        $user->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
