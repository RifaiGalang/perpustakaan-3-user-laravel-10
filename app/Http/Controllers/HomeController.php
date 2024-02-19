<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Home',
           
        );
        return view('home',$data);
    }

    public function viewdata()
    { 
        if (Auth::user()->role== 'admin') {
        return redirect('home')->with('succes','selamat');
            $data = Buku::all();
            $kategori = Kategori:: all();
            $peminjaman =Peminjaman::all();
            $users = User::all();
            return view('home', [
                'kategori' => $kategori,
                'peminjaman' => $peminjaman,
                'users' => $users,
                'title' => 'Semua Buku',
                'data' => $data,
            ]);
    }
    }
}
