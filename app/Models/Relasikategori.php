<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;
class Relasikategori extends Model
{
    // public function alldata(){
    //     return DB::table('users')
    //     ->leftJoin('kategoribuku', 'kategoribuku.id', '=', 'kategoribuku.id')
    //     ->leftJoin('kategori', 'kategori.id', '=', 'kategoribuku.id')
    //     ->get();
    // }
  
    use HasFactory;
  
    protected $table = 'relasikategori';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_buku',
        'id_kategori',
    ];
    
// public function relasikategori(){
// return $this->belongsToMany(Relasikategori::class,'relasikategori','id_buku','id_kategori');
// }
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
