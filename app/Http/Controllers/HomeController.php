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
    // HALAMAN HOME
    public function index()
    {
        $data = array(
            'title' => 'Home',
           
        );
        return view('home',$data);
    }

}
