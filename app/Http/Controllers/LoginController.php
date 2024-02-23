<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    // HALAMAN LOGIN
    public function index()
    {
        return view('login.login');
    }

    // HALAMAN REGISTRASI
    public function registrasi()
    {
        return view('login.registrasi');
    }

    // CREATE DATA REGISTRASI OLEH PEMINJAM
    public function simpanregistrasi(Request $request)
    {

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'peminjam',
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'remember_token' => Str::random(60),
        ]);
        return view('login.login');
    }

    // PROSES LOGIN
    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'email wajib di isi',
            'password.required' => 'password wajib di isi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($infologin)) {

            if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas') {
                return redirect('home')->with('Login Berhasil', 'Selamat Datang');
            } elseif (Auth::user()->role == 'peminjam') {
                return redirect('dashboard');
            } else {
                return redirect('')->withErrors('username atau password salah')->withInput();
            }
        }
        return view('/home');
    }

    // PROSES LOGOUT
    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
