<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Relasikategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BukuController extends Controller
{
    public function index()
    {
        $data=Buku::all();

        return view('datamaster.buku', [
            'title'=>'Data Buku',
            'kategori' => Kategori::all(),
            'buku' => Buku::all(),
            'data'=>$data,
        ]);
    }
    public function tambahbuku(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required',
                'id_kategori' => 'required',
                'penulis' => 'required',
                'penerbit' => 'required',
                'tahun_terbit' => 'required',
                'gambar' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',

            ],
            [
                'judul.required' => 'wajib diisi',
                'id_kategori.required' => 'wajib diisi',
                'penulis.required' => 'wajib diisi',
                'penerbit.required' => 'wajib diisi',
                'tahun_terbit.required' => 'wajib diisi',

            ]
        );

        $data_buku = ([
            'judul' => $request->judul,
            'id_kategori' => $request->id_kategori,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,

        ]);
        if ($request->hasFile('gambar')) {

            $gambar_file = $request->file('gambar');
            $gambar_nama = $gambar_file->hashName();
            $gambar_file->move(public_path('gambar'), $gambar_nama);

            $data_buku['gambar'] = $gambar_nama;
        }
        Buku::create($data_buku);
        return redirect('data-buku')->with('success','Data Berhasil Ditambah');
    }
    public function update(Request $request, $id)
    {
        // $request->validate(
        //     [
        //         'judul' => 'required',
        //         'id_kategori' => 'required',
        //         'penulis' => 'required',
        //         'penerbit' => 'required',
        //         'tahun_terbit' => 'required',
        //         'gambar' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',

        //     ],
        //     [
        //         'judul.required' => 'wajib diisi',
        //         'id_kategori.required' => 'wajib diisi',
        //         'penulis.required' => 'wajib diisi',
        //         'penerbit.required' => 'wajib diisi',
        //         'tahun_terbit.required' => 'wajib diisi',

        //     ]
        // );

        $data_edit = ([
            'judul' => $request->judul,
            'id_kategori' => $request->id_kategori,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,

        ]);
        if ($request->hasFile('gambar')) {

            $gambar_file = $request->file('gambar');
            $gambar_nama = $gambar_file->hashName();
            $gambar_file->move(public_path('gambar'), $gambar_nama);

            $data_buku = Buku:: where('id',$id)->first();
            File:: delete(public_path('gambar').'/'. $data_buku->gambar);
            $data_edit['gambar'] = $gambar_nama;
        }
        Buku:: where('id',$id)->update($data_edit);
        return redirect('data-buku');
    }
    public function destroy($id){
        $data_delete = Buku:: where('id',$id)->first();
        File:: delete(public_path('gambar').'/'. $data_delete->gambar);
        Buku:: where('id',$id)->delete();

        return redirect('data-buku');
    }
}
