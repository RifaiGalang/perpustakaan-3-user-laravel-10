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
        'id',
        'nama_kategori',
    ];
    public function buku(){
        return $this->hasMany(Buku::class);
        }
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
