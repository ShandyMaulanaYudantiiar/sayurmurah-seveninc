<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user\JProdukModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // Data Jenis Produk All
        $r_jenis_produk = JProdukModel::all();
        return view('user/userHome', compact('r_jenis_produk'));
    }
    
}
