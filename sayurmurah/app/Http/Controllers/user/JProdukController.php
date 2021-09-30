<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\JProdukModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class JProdukController extends Controller
{
    public function index()
    {
        $jproduk = JProdukModel::all();
        return view('admin.produk.create', compact('jproduk'));
    }
}
