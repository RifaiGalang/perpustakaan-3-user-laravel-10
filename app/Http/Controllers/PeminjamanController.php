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
    public function detail(){
        // $data = array(
            
        //     'detailpinjam' => Peminjaman::all(),
        // );
        // return view('data.detailpinjam', $data);
        $data=Peminjaman::all();

        return view('data.detailpinjam', [
            'peminjaman' => Peminjaman::all(),
            'buku' => Buku::all(),
            'kategori' => Kategori::all(),
            'user' => User::all(),
            'detailpinjam' => Peminjaman::all(),
            'data'=>$data,
        ]);
    }
    public function index()
    {
        $data=Peminjaman::all();

        return view('data.peminjaman', [
            'peminjaman' => Peminjaman::all(),
            'buku' => Buku::all(),
            'kategori' => Kategori::all(),
            'user' => User::all(),
            'detailpinjam' => Peminjaman::all(),
            'data'=>$data,
        ]);
        // return view('data.peminjaman');
    }
   
  
    public function pinjamtambah(Request $request)
    {

        // Peminjaman::create([
        //     'id_user'              => $_SESSION['id_user'],
        //     'id_buku'              => $_POST['id_buku'],
        //     'tgl_pinjam'   => date('Y-m-d'),
        //     'statuspeminjaman'    => 'Belum di Kembalikan',
        // ]);
        //     return redirect('pinjam')->with('success', 'Selamat, Buku berhasil di pinjam');
        //   }
        
        $data_pinjam = ([
            'id_user' => $request->id_user,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => date('Y-m-d'),
            'statuspeminjaman' => 'Belum di Kembalikan',
            
    ]);
        Peminjaman::create($data_pinjam);
        return redirect('pinjam');

    //     $timezone ='Asia/Jakarta';
    //    $date = new DateTime('now', new DateTimeZone($timezone));
    //    $tanggal = $date->format('Y-m-d');
    //    $localtime = $date->format('H:i:s');

    //    $peminjaman = Peminjaman::where([
    //     ['user_id','=',auth()->user()->id],
    //     ['tgl','=',$tanggal],
    //    ])->first();
    //    if ($peminjaman){
    //     // dd("sudah ada");
    //     return redirect('absensi-masuk')->with('toast_success', 'Data sudah ada');
        
    //    }
       
    //    else{
    //     Peminjaman::create([
    //         'user_id' => auth()->user()->id,
    //         'tgl' => $tanggal,
    //         'jammasuk' =>$localtime,
    //     ]);
    //    }
    //    return redirect('absensi-masuk');
    }
}
