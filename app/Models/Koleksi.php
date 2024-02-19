<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;
    protected $table = 'koleksipribadi';
    protected $fillable = [
        'id',
        'id_user',
        'id_buku',
    ];
    public function buku(){
        return $this->belongsTo(Buku::class, 'id_buku' ,'id');
        }
    public function user(){
        return $this->belongsTo(User::class, 'id_user' ,'id');
        }
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori' ,'id');
        }
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
