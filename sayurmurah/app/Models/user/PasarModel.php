<?php

namespace App\Models\user;

use App\Models\ProdukModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PasarModel extends Model
{
    use HasFactory;
    protected $table = 'pasar';
    public $timestamps = true;

    protected $fillable = [
        'id_daerah',
        'nama_pasar',
        'alamat_pasar',
        'foto_pasar',
    ];

    protected $primaryKey = 'id_pasar';

    public function rpasar()
    {
        return $this->belongsTo(ProdukModel::class, 'id_pasar');
        return $this->hasMany(DaerahModel::class);
    }

    public function getPasar($id_pasar)
    {
        // return DB::table('pasar', 'daerah')->where('id_pasar', $id_pasar)->first();
        return DB::table('pasar')
            ->join('daerah', 'pasar.id_daerah', '=', 'daerah.id_daerah')
            ->where('pasar.id_pasar', '=', $id_pasar)->first();
        // return DB::table('pasar')->crossJoin('daerah')->where('pasar.id_pasar', '=', $id_pasar)->get();
    }

    public function delPas($id_pasar)
    {
        return DB::table('pasar')->where('id_pasar', '=', $id_pasar)->delete();
    }
}
