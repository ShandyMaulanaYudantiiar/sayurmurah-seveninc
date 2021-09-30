<?php

namespace App\Models;

use App\Models\user\PasarModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table = 'produk';
    public $timestamps = true;

    protected $fillable = [
        'nama_produk',
        'id_jenis_produk',
        'harga_produk',
        'satuan',
        'foto_produk',
        'deskripsi_produk'
    ];

    protected $primaryKey = 'id_produk';

    public function index()
    {
        return $this->hasMany(PasarModel::class);
        return $this->belongsTo(JProdukModel::class, 'id_jenis_produk');
    }

    public function getProduk($id_produk){
        // return DB::table('produk')->where('id_produk', $id_produk)->first();
        return DB::table('produk')
                 ->join('jenis_produk', 'produk.id_jenis_produk', '=', 'jenis_produk.id_jenis_produk')
                 ->where('produk.id_jenis_produk', '=', $id_produk)
                 ->first();

        // return DB::table('pasar')
        //          ->join('daerah', 'pasar.id_daerah', '=', 'daerah.id_daerah')
        //          ->where('pasar.id_pasar', '=', $id_produk)->first();
    }

    public function delProd($id_produk)
    {
        $delete = DB::table('produk')->where('id_produk', '=', $id_produk)->delete();
        return $delete;
    }

    public function ubah($id_produk)
    {
        $update = DB::table('produk')->where('id_produk', '=', $id_produk)->update($id_produk);
        return $update;
    }
}
