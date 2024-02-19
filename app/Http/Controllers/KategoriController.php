<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Nama Kategori',
            'data_namakategori' => Kategori::all(),
        );

        return view('datamaster.kategori', $data);
    }
    public function tambahnamakategori(Request $request){
        
        Kategori::create([
            'nama_kategori'=>$request->nama_kategori,
        ]);
        return redirect('nama-kategori')->with('success','Nama Kategori Berhasil Ditambah');
    }
    public function update(Request $request, $id)
    {

        Kategori::where('id', $id)
            ->update([
                'nama_kategori' => $request->nama_kategori,
            ]);
        return redirect('nama-kategori')->with('success','Nama Kategori Berhasil Diubah');
    }
    public function destroy($id)
    {
         Kategori::where('id', $id)->delete();
        return redirect('nama-kategori')->with('success','Nama Kategori Berhasil Dihapus');
    }
}
