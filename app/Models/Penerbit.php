<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    protected $table = 'penerbit';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_penerbit',
    ];

     // MEMBERIKAN DATA KE TABEL BUKU
     public function buku()
     {
         return $this->hasMany(Buku::class);
     }
}
