<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JProdukModel extends Model
{
    use HasFactory;
    protected $table = 'jenis_produk';
    public $timestamps = true;

    protected $fillabel = [
        'jenis_produk',
        'deksripsi_jenis_produk',
        'foto_jenis_produk'
    ];

    protected $primaryKey = 'id_jenis_produk';

    public function rjproduk()
    {
        return $this->hasMany(ProdukModel::class);
    }

    public function edit($id_jenis)
    {
        return DB::table('jenis_produk')->where('id_produk', $id_jenis)->first();
    }

    public function del($id_jenis)
    {
        return DB::table('jenis_produk')->where('id_jenis_produk', '=', $id_jenis)->delete();
    }
}
