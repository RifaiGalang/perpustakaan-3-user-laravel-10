<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KoleksipribadiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenerbitController;
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

Route::get('/', [HomeController::class, 'guest'])->name('modetamu');
//LOGIN
// route::get('/', [LoginController::class, 'index']);
route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
route::post('/simpanregistrasi', [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');
route::get('/login', [LoginController::class, 'index'])->name('login');
route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//HOME BERDASARKAN SETELAH LOGIN 
Route::middleware(['auth'])->group(function () {
});

//CRUD MASTER DATA OLEH ADMIN & PETUGAS
Route::middleware(['auth', 'checkrole:admin,petugas'])->group(function () {
    // HALAMAN HOME 
    route::get('/home', [HomeController::class, 'index'])->name('home');
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
    //CRUD PENERBIT
    route::get('/nama-penerbit', [PenerbitController::class, 'index'])->name('penerbit-buku');
    route::post('/nama-penerbit/tambah', [PenerbitController::class, 'tambahnamapenerbit']);
    route::post('/nama-penerbit/update/{id}', [PenerbitController::class, 'update']);
    route::get('/nama-penerbit/destroy/{id}', [PenerbitController::class, 'destroy']);
    // MELIHAT ULASAN
    route::get('/ulasanview', [PeminjamanController::class, 'ulasanview'])->name('ulasanview');
});

//KONFIRMASI PEMINJAMAN OLEH PETUGAS
Route::middleware(['auth', 'checkrole:petugas'])->group(function () {
    route::get('/konfirmasi-pinjam', [PeminjamanController::class, 'allkonfirmpinjam'])->name('allkonfrimpinjam');
    route::get('/konfirmasi-status/{id}', [PeminjamanController::class, 'updatestatus'])->name('updatestatus');
    route::get('/kembalikan/{id}', [PeminjamanController::class, 'kembaliupdate'])->name('kembalitambah');
});

//CEK ALL DATA OLEH ADMIN
Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    // ALL DATA ADMIN
    route::get('/alldatapinjam', [PeminjamanController::class, 'alldatapinjam'])->name('alldatapinjam');
    // FILTER TANGGAL RENTAN WAKTU 
    route::get('/filter', [PeminjamanController::class, 'filter'])->name('filter');
});

//CRUD PEMINJAM
Route::middleware(['auth', 'checkrole:peminjam'])->group(function () {
    //DASHBOARD PEMINJAM
    route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboardpeminjam');
    // MENAMBAHKAN PEMINJAMAN
    route::get('/pinjam', [PeminjamanController::class, 'index'])->name('pinjam');
    route::get('/pinjam/tambah/{id}', [PeminjamanController::class, 'pinjamtambah'])->name('pinjamtambah');
    // KOLEKSI OLEH PEMINJAM
    route::get('/koleksi-pribadi', [KoleksipribadiController::class, 'index'])->name('koleksi');
    route::get('/koleksi/tambah/{id}', [KoleksipribadiController::class, 'koleksitambah'])->name('koleksitambah');
    route::get('/koleksi-pribadi/destroy/{id}', [KoleksipribadiController::class, 'destroy']);
    route::get('/koleksi/pinjam/{id}', [KoleksipribadiController::class, 'Koleksipinjam'])->name('koleksipinjam');
    route::get('/detailpinjam', [PeminjamanController::class, 'detail'])->name('detailpinjam');
    //ULASAN
    route::post('/ulasan/tambah/{id}', [PeminjamanController::class, 'ulasantambah'])->name('ulasantambah');
});

//BATALKAN PEMINJAMAN OLEH USER & PETUGAS
Route::middleware(['auth', 'checkrole:peminjam,petugas'])->group(function () {
    // BATALKAN PEMINJAMAN
    route::get('/pinjam/destroy/{id}', [PeminjamanController::class, 'destroy'])->name('destroy');
});
