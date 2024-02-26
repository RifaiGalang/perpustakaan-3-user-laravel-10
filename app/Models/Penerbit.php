<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Penerbit extends Model
{
    use HasFactory;
    protected $table = 'penerbit';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_penerbit',
    ];

     // MEMBERIKAN DATA KE TABEL BUKU
     public function buku()
     {
         return $this->hasMany(Buku::class);
     }
     public function koleksi(){
        return $this->hasMany(Koleksi::class);
    }
     
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
