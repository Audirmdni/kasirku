<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\kasir; // Pastikan model User diimport
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function LoginProses()
    {
        if (auth()->guard('admin')->attempt(['username' => request('username'), 'password' => request('password')])) {
            return redirect('admin')->with('success', 'Login Berhasil');
        }

        if (auth()->guard('kasir')->attempt(['username' => request('username'), 'password' => request('password')])) {
            return redirect('kasir')->with('success', 'Login Berhasil');
        }

        return redirect('login');
    }

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        return redirect('/login');
    }

    public function register()
    {
        return view('register');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new Kasir();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->foto= $request->foto ?? "";
        $user->save();

        auth()->login($user);

        return redirect('/kasir')->with('success', 'Registrasi Berhasil');
    }
}