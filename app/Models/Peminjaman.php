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
    ];
    public function buku(){
        return $this->hasMany(Buku::class);
        }
    public function user(){
        return $this->hasMany(user::class);
        }
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
