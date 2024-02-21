<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $table = 'ulasanbuku';
    protected $fillable = [
        'id_user',
        'id_buku',
        'ulasan',
        'rating',
    ];

    // MENGAMBIL DATA DARI TABEL BUKU 
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }

    // MENGAMBIL DATA DARI TABEL USER
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
