<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $data=Peminjaman::all();

        return view('data.peminjaman', [
            'peminjaman' => Peminjaman::all(),
            'buku' => Buku::all(),
            'kategori' => Kategori::all(),
            'user' => User::all(),
            'data'=>$data,
        ]);
        // return view('data.peminjaman');
    }
}
