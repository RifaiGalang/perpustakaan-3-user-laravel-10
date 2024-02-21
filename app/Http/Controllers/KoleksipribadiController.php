<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;

class KoleksipribadiController extends Controller
{
    // DATA ALL KOLEKSI OLEH PEMINJAM
    public function index()
    {
        $user = auth()->id();
        $data = Koleksi::where('id_user', $user)->get();
        return view('datacustom.koleksi', [
            'title' => 'Koleksi Pribadi',
            'koleksi' => Koleksi::all(),
            'buku' => Buku::all(),
            'kategori' => Kategori::all(),
            'user' => User::all(),
            'detailpinjam' => Peminjaman::all(),
            'data' => $data,
        ]);
    }

    // CREATE KOLEKSI OLEH PEMINJAM
    public function koleksitambah(Request $request, $id)
    {

        $data_koleksi = ([
            'id_user' => auth()->user()->id,
            'id_buku' => $id,
        ]);
        Koleksi::create($data_koleksi);
        return redirect('pinjam')->with('success', 'Buku berhasil di tambahkan ke koleksi');
    }

    // DELETE KOLEKSI OLEH PEMINJAM
    public function destroy($id)
    {
        Koleksi::where('id', $id)->delete();
        return redirect('koleksi-pribadi')->with('success', 'Data Berhasil Dihapus');
    }
}
