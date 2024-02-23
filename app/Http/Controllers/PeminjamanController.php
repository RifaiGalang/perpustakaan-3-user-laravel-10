<?php

namespace App\Http\Controllers;


use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    // DETAIL PEMINJAMAN OLEH USER
    public function detail()
    {
        $user = auth()->id();
        $data = Peminjaman::where('id_user', $user)->get();

        return view('datacustom.detailpinjam', [
            'title' => 'Detail peminjaman',
            'peminjaman' => Peminjaman::all(),
            'buku' => Buku::all(),
            'kategori' => Kategori::all(),
            'user' => User::all(),
            'detailpinjam' => Peminjaman::all(),
            'data' => $data,
        ]);
    }

    // DATA KESELURUHAN BUKU
    public function index()
    {
        $data = Buku::all();

        return view('datacustom.peminjaman', [
            'title' => 'Peminjaman Buku',
            'peminjaman' => Peminjaman::all(),
            'buku' => Buku::all(),
            'kategori' => Kategori::all(),
            'user' => User::all(),
            'ulasanbuku' => Ulasan::all(),
            'detailpinjam' => Peminjaman::all(),
            'data' => $data,
        ]);
    }

    // DATA PEMINJAMAN ALL OLEH ADMIN 
    public function alldatapinjam()
    {
        $data = Peminjaman::all();

        return view('datarekap.allpinjam', [
            'title' => 'All Data Pinjam',
            'peminjaman' => Peminjaman::all(),
            'buku' => Buku::all(),
            'kategori' => Kategori::all(),
            'user' => User::all(),
            'detailpinjam' => Peminjaman::all(),
            'data' => $data,
        ]);
    }

    // FILTER DATA PERTANGGAL OLEH ADMIN
    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $data = Peminjaman::whereDate('created_at', '>=', $start_date)
            ->wheredate('created_at', '<=', $end_date)
            ->get();
        $kategori = Kategori::all();
        return view('datarekap.allpinjam', [
            'buku' => Buku::all(),
            'title' => 'Cari',
            'kategori' => $kategori,
            'penerbit' => Penerbit::all(),
            'peminjaman' => Peminjaman::all(),
            'data' => $data,
        ])->with('success', 'Berhasil Login');
    }

    // DATA JUMLAH KONFIRMASI PEMINJAMAN 
    public function allkonfirmpinjam()
    {
        $data = Peminjaman::all();

        return view('datarekap.konfirmpinjam', [
            'title' => 'All Konfirmasi Pinjam',
            'peminjaman' => Peminjaman::all(),
            'buku' => Buku::all(),
            'kategori' => Kategori::all(),
            'user' => User::all(),
            'detailpinjam' => Peminjaman::all(),
            'data' => $data,
        ]);
    }

    // PROSES PENGAJUAN PEMINJAMAN OLEH PEMINJAM
    public function pinjamtambah(Request $request, $id)
    {
        // Periksa ketersediaan stok buku sesuai ID buku yang dipilih
        $buku = Buku::find($id);

        // Periksa jika  stok habis
        if (!$buku || $buku->stok == 0) {
            return redirect()->back()->with('errors', 'Buku tidak tersedia atau stok habis');
        } else {
            $data_pinjam = ([
                // 'kode_pinjam' => random_int(10000000, 999999999),
                'id_user' => auth()->user()->id,
                'id_buku' => $id,
                'tgl_pinjam' => now(),
                'statuspeminjaman' => 'Menunggu Konfirmasi',

            ]);
            // Mengurangi Stok buku yang di pinjam
            $buku->update([
                'stok' => $buku->stok - 1
            ]);
            Peminjaman::create($data_pinjam);
            return redirect('detailpinjam')->with('success', 'Silahkan konfirmasi ke petugas');
        }
        // }
        // }
    }

    // BATALKAN PEMINJAMAN
    public function destroy($id)
    {

        $data = Peminjaman::findOrfail($id);
        // Menambah Stok buku yang di kembalikan
        $data->buku->update([
            'stok' => $data->buku->stok + 1
        ]);
        Peminjaman::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Peminjaman Berhasil Dibatalkan');
    }

    // PROSES KONFIRMASI PEMINJAMAN OLEH PETUGAS
    public function updatestatus(Request $request, $id)
    {
        // Peminjaman buku
        $data = Peminjaman::findOrfail($id);
        $data->update([
            'statuspeminjaman' => 'Belum di Kembalikan',
        ]);


        return redirect('konfirmasi-pinjam')->with('success', 'Berhasil Mengonfirmasi');
    }

    // PROSES PENGEMBALIAN PINJAMAN OLEH PETUGAS
    public function kembaliupdate(Request $request, $id)
    {
        // Pengembalian buku
        $data = Peminjaman::findOrfail($id);
        $data->update([
            'tgl_kembali' => now(),
            'statuspeminjaman' => 'Sudah di Kembalikan',
        ]);
        // Menambah Stok buku yang di kembalikan
        $data->buku->update([
            'stok' => $data->buku->stok + 1
        ]);


        return redirect('konfirmasi-pinjam')->with('success', 'Selamat, Buku Berhasil di Kembalikan');
    }

    // CREATE ULASAN OLEH PEMINJAM
    public function ulasantambah(Request $request, $id)
    {

        $data_ulasan = ([
            'id_user' => auth()->user()->id,
            'id_buku' => $id,
            'ulasan' => $request->ulasan,
            'rating' => $request->rating,

        ]);
        Ulasan::create($data_ulasan);
        return redirect('pinjam')->with('success', 'Ulasan Berhasil di Kirim!');
    }

    // VIEW DATA ULASAN OLEH ADMIN & PETUGAS
    public function ulasanview()
    {
        $data = Ulasan::all();

        return view('datarekap.allulasan', [
            'title' => 'All Data Pinjam',
            'peminjaman' => Peminjaman::all(),
            'buku' => Buku::all(),
            'ulasanbuku' => Ulasan::all(),
            'kategori' => Kategori::all(),
            'user' => User::all(),
            'detailpinjam' => Peminjaman::all(),
            'data' => $data,
        ]);
    }
}
