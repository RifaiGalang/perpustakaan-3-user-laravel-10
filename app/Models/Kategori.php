<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Kategori extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'kategoribuku';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kategori',
    ];

    // MEMBERIKAN DATA KE TABEL BUKU
    public function buku()
    {
        return $this->hasMany(Buku::class);
    }

    // MEMBERIKAN DATA KE TABEL KOLEKSI PRIBADI
    public function koleksi()
    {
        return $this->hasMany(Koleksi::class);
    }

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
