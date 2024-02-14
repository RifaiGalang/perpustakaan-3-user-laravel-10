<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('/login');
// });

//LOGIN
route::get('/', [LoginController::class, 'index']);
route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
route::post('/simpanregistrasi', [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');
route::get('/login', [LoginController::class, 'index'])->name('login');
route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//HOME BERDASARKAN SETELAH LOGIN 
Route::middleware(['auth'])->group(function () {
    route::get('/home', [HomeController::class, 'index'])->name('home');
});

//CRUD USER
Route::middleware(['auth', 'checkrole:admin,petugas'])->group(function () {
    route::get('/data-user', [UserController::class, 'index'])->name('data-user');
    route::post('/data-user/tambah', [UserController::class, 'tambahuser']);
    route::post('/data-user/update/{id}', [UserController::class, 'update']);
    route::get('/data-user/destroy/{id}', [UserController::class, 'destroy']);
    //CRUD BUKU
    route::get('/data-buku', [BukuController::class, 'index'])->name('data-buku');
    route::post('/data-buku/tambah', [BukuController::class, 'tambahbuku'])->name('tambahbuku');
    route::post('/data-buku/update/{id}', [BukuController::class, 'update']);
    route::get('/data-buku/destroy/{id}', [BukuController::class, 'destroy']);
    //CRUD KATEGORI
    route::get('/nama-kategori', [KategoriController::class, 'index'])->name('kategori-buku');
    route::post('/nama-kategori/tambah', [KategoriController::class, 'tambahnamakategori']);
    route::post('/nama-kategori/update/{id}', [KategoriController::class, 'update']);
    route::get('/nama-kategori/destroy/{id}', [KategoriController::class, 'destroy']);
});


Route::middleware(['auth', 'checkrole:peminjam,petugas'])->group(function () {
    route::get('/pinjam', [PeminjamanController::class, 'index'])->name('pinjam');
});
