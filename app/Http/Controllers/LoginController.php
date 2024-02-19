<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function registrasi(){
        return view('login.registrasi');
    }
    public function simpanregistrasi(Request $request){
        
        User::create([
            'username'=>$request->username,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'role'=> 'peminjam',
            'nama_lengkap'=> $request->nama_lengkap,
            'alamat'=> $request->alamat,
            'remember_token'=> Str::random(60),
        ]);
        return view('login.login');
    }
    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'email wajib di isi',
            'password.required' => 'password wajib di isi'
        ]);

        // if(Auth::attempt($request->only('email','password')));{

        //     return redirect('/home');
        // }
      
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($infologin)) {
            return redirect('/home');
            // if (Auth::user()->role == 'admin') {
            //     return redirect('/home');
            // } elseif (Auth::user()->role == 'petugas') {
            //     return redirect('/home');
            // } elseif (Auth::user()->role == 'peminjam') {
            //     return redirect('/home');
            } else {
                return redirect('')->withErrors('username atau password salah')->withInput();
            }
        // }
        return view('/home');
    }
    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
