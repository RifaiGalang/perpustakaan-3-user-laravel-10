<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data User',
            'data_user' => User::all(),
        );

        return view('datamaster.user', $data);
    }
    public function tambahuser(Request $request)
    {

        User::create([
            'username' => $request->username,
            'email' => $request->email, 
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'remember_token' => Str::random(60),
        ]);
        return redirect('data-user')->with('success','Data Berhasil Disimpan');
    }
    public function update(Request $request, $id)
    {

        User::where('id', $id)
            ->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'nama_lengkap' => $request->nama_lengkap,
                'alamat' => $request->alamat,
                'remember_token' => Str::random(60),
            ]);
        return redirect('data-user')->with('success','Data Berhasil Diubah');
    }
    public function destroy($id)
    {
         User::where('id', $id)->delete();
        return redirect('data-user')->with('success','Data Berhasil Dihapus');
    }
}
