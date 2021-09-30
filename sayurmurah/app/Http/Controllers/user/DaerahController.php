<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\user\DaerahModel;
use Illuminate\Http\Request;

class DaerahController extends Controller
{
    public function index()
    {
        $data_daerah = DaerahModel::all();
        return view('admin.daerah.daerah', compact('data_daerah'));
    }

    public function create(Request $request)
    {
        //Menampilkan 
        $d_daerah = DaerahModel::all();
        return view('admin.daerah.create', compact('d_daerah'));
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
            'nama_daerah'      => 'required',
            'jumlah_pasar'     => 'required'
        ], $message);

        //pasing data
        $pasar                     = new DaerahModel();
        $pasar->nama_daerah         = $request->nama_daerah;
        $pasar->jumlah_pasar       = $request->jumlah_pasar;
        $pasar->save();

        if ($pasar) {
            // Pesan Ketika Akun Berhasil 
            return redirect()->route('data.daerah')->with(['success' => 'Data Berhasil Disimpan!']);
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
     * @param  \App\Models\User\DaerahModel  $daerahmodel
     */
    public function edit(Request $request, $id_daerah)
    {
        $this->DaerahModel = new DaerahModel();
        $data = $this->DaerahModel->getDaerah($id_daerah);

        return view('admin/daerah/editdaerah', compact('data'));
        // return var_dump($data);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  \App\Models\User\DaerahModel  $daerahmodel
     */
    public function update(Request $request, $id_daerah)
    {
        $daerah = DaerahModel::findorfail($id_daerah);
        $update = $daerah->update($request->all());

        if ($update) {
            // Pesan Ketika Akun Berhasil 
            return redirect()->route('data.daerah')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data.daerah')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    // public function update(Request $request, DaerahModel $daerahModel, $id_daerah)
    // {
    //     $request->validate([
    //         'nama_daerah'     => 'required',
    //         'jumlah_pasar'  => 'required'
    //     ]);

    //     $daerahModel->ubah([
    //         'nama_daerah'   => $request->nama_daerah,
    //         'jumlah_pasar'  => $request->jumlah_pasar,
    //         'updated_at'    => date('YmdHis')
    //     ], $id_daerah);

    //     if($daerahModel){
    //         // Pesan Ketika Akun Berhasil 
    //         return redirect()->route('data.daerah')->with(['success' => 'Data Berhasil Disimpan!']);

    //         }else{
    //             //redirect dengan pesan error
    //             return redirect()->route('data.daerah')->with(['error' => 'Data Gagal Disimpan!']);
    //         }
    // }

    public function delete(DaerahModel $daerahmodel, $id_daerah)
    {
        $daerah = $daerahmodel->delDah($id_daerah);

        if ($daerah) {
            // Pesan Ketika Akun Berhasil 
            return redirect()->route('data.daerah')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data.daerah')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
