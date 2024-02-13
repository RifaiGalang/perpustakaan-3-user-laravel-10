<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Relasikategori;
use Illuminate\Http\Request;

class RelasikategoriController extends Controller
{

    public function index()
    {
        // $data = array(
        //     'title' => 'Nama Kategori',
        //     // 'data_namakategori' => Kategori::all(),
        //     // 'data_namabuku' => Buku::all(),
        //     // 'data_buku' => RelasiKategori::join('buku','buku.id','=','relasikategori.id_buku')
        //     // ->select('relasikategori.*','buku.judul')
        //     // ->get(),

        //     // 'data_kategori' => RelasiKategori::join('kategoribuku','kategoribuku.id','=','relasikategori.id_kategori')
        //     // ->select('relasikategori.*','kategoribuku.nama_kategori')
        //     // ->get(),
        //     // 'data_kategori'=> Relasikategori::all(),
        //     // 'data_kategori'=> Relasikategori::with('relasikategori')->get()
        //     // 'datarelasi' => Relasikategori::all(),
        //     // 'data_buku' => Buku::all(),
        // );
        $data = array(
            'databuku' => Buku:: all(),
            // 'datakategori' => Kategori:: all(),
        );
       
        return view('data.relasikategori',$data);
    }
    public function tambahkategori(Request $request)
    {

        Relasikategori::create([
            'id_buku' => $request->id_buku,
            'id_kategori' => $request->id_kategori,
        ]);
        return redirect('kategori');
    }
    public function update(Request $request, $id)
    {

        Relasikategori::where('id', $id)
            ->update([
                'id_buku' => $request->id_buku,
                'id_kategori' => $request->id_kategori,
            ]);
        return redirect('kategori')->with('succes', 'Data Berhasil Diubah');
    }
    public function destroy($id)
    {
        Relasikategori::where('id', $id)->delete();
        return redirect('kategori')->with('succes', 'Data Berhasil Dihapus');
    }
}
