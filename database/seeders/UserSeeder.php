<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username'=>'AdminAplikasi',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('admin'),
            'role'=>('admin'),
            'nama_lengkap'=>('admin perpus'),
            'alamat'=>('ponorogo'),
            'remember_token'=> Str::random(60),
        ]);
        DB::table('users')->insert([
            'username'=>'PetugasAplikasi',
            'email'=>'petugas@petugas.com',
            'password'=>bcrypt('petugas'),
            'role'=>('petugas'),
            'nama_lengkap'=>('petugas perpus'),
            'alamat'=>('ponorogo'),
            'remember_token'=> Str::random(60),
        ]);
    }
}
