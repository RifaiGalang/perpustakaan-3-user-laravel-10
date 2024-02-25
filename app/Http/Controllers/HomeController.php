<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // HALAMAN HOME
    public function index()
    {
        $data = array(
            'title' => 'Home',
            'user' => User::where('role', 'peminjam')->count(),
            'buku' => Buku::count(),
            'penerbit' => Penerbit::count(),
            'peminjaman' => Peminjaman::count(),
            'statuspeminjaman' => Peminjaman::where('statuspeminjaman', 'Menunggu Konfirmasi')->count(),
        );
        if (auth()->user()->role != 'peminjam') {
            return view('home', $data);
        } else {
            return abort(403);
        }




        return view('home', $data);
    }

    // HALAMAN DASHBOARD PEMINJAM
    public function dashboard()
    {
        $user = auth()->id();
        $data = array(
            'title' => 'Home',
            'buku' => Buku::count(),
            'peminjaman' => Peminjaman::where('id_user', $user)
                ->where('statuspeminjaman', 'Belum di Kembalikan')->count(),
            'koleksi' => Koleksi::where('id_user', $user)->count(),
        );
        if (auth()->user()->role = 'peminjam') {
            return view('datacustom.dashboard', $data);
        }
    }

    public function guest()
    {
        $data = Buku::all();

        return view('tamu', [
            'title' => 'Semua Buku',
            'kategori' => Kategori::all(),
            'penerbit' => Penerbit::all(),
            'buku' => Buku::all(),
            'data' => $data,
        ]);
    }
}
