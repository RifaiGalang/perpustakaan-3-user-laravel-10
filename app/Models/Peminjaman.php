<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'id',
        'id_user',
        'id_buku',
        'tgl_pinjam',
        'tgl_kembali',
        'statuspeminjaman',
    ];
    public function buku(){
        return $this->belongsTo(Buku::class, 'id_buku' ,'id');
        }
    public function user(){
        return $this->belongsTo(user::class, 'id_user' ,'id');
        }
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
