<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('admin/transaksi/transaksi');
    }

    public function detail()
    {
        return view('admin/transaksi/detailtrans');
    }
}
