<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DaerahModel extends Model
{
    use HasFactory;

    protected $table = 'daerah';
    public $timestamps = true;

    protected $fillable = [
        'nama_daerah',
        'jumlah_pasar',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'id_daerah';

    public function rdaerah()
    {
        return $this->belongsTo(PasarModel::class, 'id_daerah');
    }

    public function getDaerah($id_daerah)
    {
        return DB::table('daerah')->where('id_daerah', $id_daerah)->first();
        // return DB::table('pasar')
        //          ->join('daerah', 'pasar.id_daerah', '=', 'daerah.id_daerah')
        //          ->where('pasar.id_pasar', '=', $id_pasar)->first();
        // return DB::table('pasar')->crossJoin('daerah')->where('pasar.id_pasar', '=', $id_pasar)->get();
    }

    public function delDah($id_daerah)
    {
        return DB::table('daerah')->where('id_daerah', '=', $id_daerah)->delete();
    }
    //     public function ubah($id_daerah)
    //     {
    //         return DB::table('daerah')->where('id_daerah', '=', $id_daerah)->update($id_daerah);
    //     }
}
