<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey ='id';
    protected $fillable = [
        'id',
        'judul',
        'id_kategori',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'gambar'
    ];
    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori','id');
        }
    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class,'id_buku','id');
        }
    

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
