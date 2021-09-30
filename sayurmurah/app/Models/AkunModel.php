<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AkunModel extends Model
{
    use HasFactory;

    protected $table = 'admin';
    public $timestamps = true;

    protected $fillable = [
        'nama', 'email', 'foto', 'telepon', 'password', 'akses'
    ];

    protected $primaryKey = 'id_admin';

    // public function profile($admin, $id_admin)
    // {
    //     $admin = DB::table('admin')->where('id_admin', $id_admin)->first();
    //     return ($admin);
    // }

    public function getProfile($id_admin)
    {
        return DB::table('admin')->where('id_admin', $id_admin)->first();
    }
}
