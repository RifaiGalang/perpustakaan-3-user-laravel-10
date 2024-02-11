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
        'penulis',
        'penerbit',
        'tahun_terbit',
        'gambar'
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
