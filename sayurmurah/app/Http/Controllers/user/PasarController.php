<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\PasarModel;
use App\Models\user\DaerahModel;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class PasarController extends Controller
{
    public function index()
    {
        $data_pasar = PasarModel::all();
        return view('admin.pasar.pasar', compact('data_pasar'));
    }

    public function create(Request $request)
    {
        //Menampilkan 
        $r_pasar = PasarModel::all();
        $r_daerah = DaerahModel::all();
        return view('admin.pasar.create', compact('r_pasar', 'r_daerah'));

        // return view('admin.produk.create',compact('r_produk','jproduk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Kolom wajib diisi.'
        ];
        //form validation
        $this->validate(request(), [
            'id_daerah'      => 'required',
            'nama_pasar'     => 'required',
            'alamat_pasar'  => 'required',
            'foto_pasar'    =>  'required'
        ], $message);
        //
        $pasar                     = new PasarModel();
        $pasar->id_daerah          = $request->id_daerah;
        $pasar->nama_pasar         = $request->nama_pasar;
        $pasar->alamat_pasar       = $request->alamat_pasar;
        if ($image = $request->file('foto_pasar')) {
            $destinationPath = 'image/admin/pasar/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $pasar['foto_pasar'] = "$profileImage";
        }

        $pasar->save();

        if ($pasar) {
            // Pesan Ketika Akun Berhasil 
            return redirect()->route('data.pasar')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('regis.show')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  \App\Models\User\PasarModel  $pasarmodel
     */
    public function update(Request $request, $id_pasar)
    {
        $pasar = PasarModel::findorfail($id_pasar);
        if ($image = $request->file('foto_pasar')) {
            $destinationPath = 'image/admin/pasar/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $pasar['foto_pasar'] = "$profileImage";
        }
        $update = $pasar->update($request->all());

        if ($update) {
            // Pesan Ketika Akun Berhasil 
            return redirect()->route('data.pasar')->with(['success' => 'Data Berhasil Diperbaharui!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data.pasar')->with(['error' => 'Data Gagal Diperbaharui!']);
        }
    }

    public function edit(Request $request, $id_pasar)
    {
        // $r_pasar = PasarModel::all();
        // $r_daerah = DaerahModel::all();
        // return view('admin/pasar/editpasar', compact('r_pasar', 'r_daerah'));
        $this->PasarModel = new PasarModel();
        $data = $this->PasarModel->getPasar($id_pasar);
        return view('admin/pasar/editpasar', compact('data'));
    }

    public function delete(PasarModel $pasarmodel, $id_pasar)
    {
        $pasar = $pasarmodel->delPas($id_pasar);

        if ($pasar) {
            // Pesan Ketika Akun Berhasil 
            return redirect()->route('data.pasar')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data.pasar')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
