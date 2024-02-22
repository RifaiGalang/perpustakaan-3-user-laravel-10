<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
// DATA PENERBIT ALL
public function index()
{
    $data = array(
        'title' => 'Nama Kategori',
        'data_namapenerbit' => Penerbit::all(),
    );

    return view('datamaster.penerbit', $data);
}

// CREATE KATEGORI
public function tambahnamapenerbit(Request $request){
    
    Penerbit::create([
        'nama_penerbit'=>$request->nama_penerbit,
    ]);
    return redirect('nama-penerbit')->with('success','Nama Penerbit Berhasil Ditambah');
}

// UPDATE KATEGORI
public function update(Request $request, $id)
{

    Penerbit::where('id', $id)
        ->update([
            'nama_penerbit' => $request->nama_kategori,
        ]);
    return redirect('nama-penerbit')->with('success','Nama Penerbit Berhasil Diubah');
}

// DELETE PENERBIT
public function destroy($id)
{
     Penerbit::where('id', $id)->delete();
    return redirect('nama-penerbit')->with('success','Nama Penerbit Berhasil Dihapus');
}}
