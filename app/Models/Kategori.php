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
    protected $fillable = [
        'nama_kategori',
    ];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
