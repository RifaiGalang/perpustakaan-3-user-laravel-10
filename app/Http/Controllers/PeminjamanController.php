<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function detail()
    {
        $user = auth()->id();
        $data = Peminjaman::where('id_user', $user)->get();

        return view('datacustom.detailpinjam', [
            'title'=>'Detail peminjaman',
            'peminjaman' => Peminjaman::all(),
            'buku' => Buku::all(),
            'kategori' => Kategori::all(),
            'user' => User::all(),
            'detailpinjam' => Peminjaman::all(),
            'data' => $data,
        ]);
    }
    public function index()
    {
        $data = Buku::all();

        return view('datacustom.peminjaman', [
            'title'=>'Peminjaman Buku',
            'peminjaman' => Peminjaman::all(),
            'buku' => Buku::all(),
            'kategori' => Kategori::all(),
            'user' => User::all(),
            'detailpinjam' => Peminjaman::all(),
            'data' => $data,
        ]);
    }
    public function alldatapinjam()
    {
        $data = Peminjaman::all();

        return view('datarekap.allpinjam', [
            'title'=>'All Data Pinjam',
            'peminjaman' => Peminjaman::all(),
            'buku' => Buku::all(),
            'kategori' => Kategori::all(),
            'user' => User::all(),
            'detailpinjam' => Peminjaman::all(),
            'data' => $data,
        ]);
    }


    public function pinjamtambah(Request $request, $id)
    {

        $data_pinjam = ([
            'id_user' => auth()->user()->id,
            'id_buku' => $id,
            'tgl_pinjam' => now(),
            'statuspeminjaman' => 'Belum di Kembalikan',

        ]);
        Peminjaman::create($data_pinjam);
        return redirect('pinjam')->with('success', 'Selamat, Buku berhasil di pinjam');
    }
    public function kembaliupdate(Request $request, $id)
    {
        $data = Peminjaman::findOrfail($id);
        $data->update([
            'tgl_kembali' => now(),
            'statuspeminjaman' => 'Sudah di Kembalikan',
        ]);
        
        return redirect('detailpinjam')->with('success', 'Selamat, Buku Berhasil di Kembalikan');
    }
}
