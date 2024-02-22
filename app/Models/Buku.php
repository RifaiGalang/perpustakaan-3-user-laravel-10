<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'judul',
        'id_kategori',
        'penulis',
        'id_penerbit',
        'tahun_terbit',
        'stok',
        'gambar'
    ];

    // MENGAMBIL DATA PADA TABEL KATEGORI
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    // MENGAMBIL DATA PADA TABEL PENERBIT
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit', 'id');
    }

    // MEMBERIKAN DATA KE TABEL PEMINJAMAN
    public function buku()
    {
        return $this->hasMany(Peminjaman::class);
    }

    // MEMBERIKAN DATA KE TABEL KOLEKSI PRIBADI
    public function koleksi()
    {
        return $this->hasMany(Koleksi::class);
    }

    // MEMBERIKAN DATA KE TABEL ULASAN BUKU
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
