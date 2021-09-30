<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use App\Models\user\PasarModel;
use App\Models\user\JProdukModel;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = ProdukModel::all();
        $pasar = PasarModel::all();
        return view('admin.produk.produk', compact('pasar', 'produk'));
        // return view('admin.produk.produk', compact('data_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Menampilkan 
        // $r_produk = ProdukModel::all();
        $r_pasar = PasarModel::all();
        $jproduk = JProdukModel::all();
        return view('admin.produk.create', compact('r_pasar', 'jproduk'));

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
            'pasar'    =>  'required',
            'nama_produk'      => 'required',
            'id_jenis_produk'     => 'required',
            'harga_produk'  => 'required',
            'satuan'    =>  'required',
            'deskripsi_produk'    =>  'required',
            'foto_produk'    =>  'required'
        ], $message);

        //
        $produk                     = new ProdukModel;
        $produk->id_pasar           = $request->pasar;
        $produk->nama_produk        = $request->nama_produk;
        $produk->id_jenis_produk    = $request->id_jenis_produk;
        $produk->harga_produk       = $request->harga_produk;
        $produk->satuan             = $request->satuan;
        $produk->deskripsi_produk   = $request->deskripsi_produk;
        $produk->created_at         = date('YmdHis');
        $produk->updated_at         = date('YmdHis');
        if ($image = $request->file('foto_produk')) {
            $destinationPath = 'image/admin/produk/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $produk['foto_produk'] = "$profileImage";
        }

        $produk->save();

        if ($produk) {
            // Pesan Ketika Akun Berhasil 
            return redirect()->route('data.produk')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data.produk')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdukModel  $produkModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukModel $produkModel)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukModel  $produkModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_produk)
    {
        $this->ProdukModel = new ProdukModel();
        $data = $this->ProdukModel->getProduk($id_produk);
        // var_dump($data);
        return view('admin/produk/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukModel  $produkModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_produk)
    {
        $produk = ProdukModel::findorfail($id_produk);
        $update = $produk->update($request->all());

        if ($update) {
            // Pesan Ketika Akun Berhasil 
            return redirect()->route('data.daerah')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data.daerah')->with(['error' => 'Data Gagal Disimpan!']);
        }

        // $request->validate([
        //     'nama_produk'     => 'required',
        //     'id_jenis_produk'  => 'required',
        //     'satuan'  => 'required',
        //     'harga'  => 'required',
        //     'pasar'  => 'required',
        //     'deskripsi_produk'  => 'required'
        // ]);

        // $produkModel->ubah([
        //     'nama_produk'     => $request->nama_produk,
        //     'id_jenis_produk'  => $request->id_jenis_produk,
        //     'satuan'  => $request->satuan,
        //     'harga'  => $request->harga,
        //     'pasar'  => $request->pasar,
        //     'deskripsi_produk'  => $request->deskripsi_produk,
        //     'updated_at'  => date('YmdHis')
        // ], $id_produk);
        // if($produkModel){
        //     // Pesan Ketika Akun Berhasil 
        //     return redirect()->route('data.produk')->with(['success' => 'Data Berhasil Disimpan!']);
    
        //     }else{
        //         //redirect dengan pesan error
        //         return redirect()->route('data.produk')->with(['error' => 'Data Gagal Disimpan!']);
        //     }

        // $produkModel->ubah([
        //     'nama_produk'     => $request->nama_produk,
        //     'id_jenis_produk'  => $request->id_jenis_produk,
        //     'satuan'  => $request->satuan,
        //     'harga'  => $request->harga,
        //     'pasar'  => $request->pasar,
        //     'deskripsi_produk'  => $request->deskripsi_produk,
        //     'updated_at'  => date('YmdHis')
        // ], $id_produk);
        // if ($produkModel) {
        //     // Pesan Ketika Akun Berhasil 
        //     return redirect()->route('data.produk')->with(['success' => 'Data Berhasil Disimpan!']);
        // } else {
        //     //redirect dengan pesan error
        //     return redirect()->route('data.produk')->with(['error' => 'Data Gagal Disimpan!']);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukModel  $produkModel
     * @return \Illuminate\Http\Response
     */
    public function delete(ProdukModel $produkmodel, $id_produk)
    {
        $produk = $produkmodel->delProd($id_produk);

        if ($produk) {
            // Pesan Ketika Akun Berhasil 
            return redirect()->route('data.produk')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data.produk')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    /*------------------------------------------- KATEGORI PRODUK -------------------------------------------------------*/

    // SHOW
    public function kategori()
    {
        $kategori = JProdukModel::all();
        return view('admin/kategoriproduk/kategori', compact('kategori'));
    }

    // V_TAMBAH
    public function kcreate()
    {
        return view('admin/kategoriproduk/tambahkategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // CREATE
    public function kstore(Request $request)
    {
        //pesan error
        $message = [
            'required' => 'Kolom wajib diisi.'
        ];
        //form validation
        $this->validate(request(), [
            'nama'      => 'required',
            'deskripsi'   => 'required',
            'foto'      => 'required|image'
        ], $message);

        //insert data to db
        $jenis                          = new JProdukModel();
        $jenis->jenis_produk            = $request['nama'];
        $jenis->deskripsi_jenis_produk  = $request['deskripsi'];
        $jenis->created_at       = date('YmdHis');
        $jenis->updated_at       = date('YmdHis');
        if ($image = $request->file('foto')) {
            $destinationPath = 'image/admin/jenisproduk/';
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $jenis['foto_jenis_produk'] = "$imageName";
        }
        $jenis->save();

        if ($jenis) {
            return redirect()->route('kategoriproduk')->with(['success' => 'Data berhasil disimpan!']);
        } else {
            return redirect()->route('kategoriproduk')->with(['error' => 'Data gagal disimpan!']);
        }
    }

    public function hapus(JProdukModel $jenismodel, $id_jenis)
    {
        $jenis = $jenismodel->del($id_jenis);

        if ($jenis) {
            // Pesan Ketika Akun Berhasil 
            return redirect()->route('kategoriproduk')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('kategoriproduk')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    public function kedit(Request $request, $id_jenis)
    {
        $this->JProdukModel = new JProdukModel();

        $data = $this->JProdukModel->edit($id_jenis);
        // var_dump($data);
        return view('admin/kategoriproduk/editkategori', compact('data'));
    }

    public function kupdate(Request $request, ProdukModel $produkModel, $id_produk)
    {
        $request->validate([
            'nama_produk'     => 'required',
            'id_jenis_produk'  => 'required',
            'satuan'  => 'required',
            'harga'  => 'required',
            'pasar'  => 'required',
            'deskripsi_produk'  => 'required'
        ]);

        $produkModel->ubah([
            'nama_produk'     => $request->nama_produk,
            'id_jenis_produk'  => $request->id_jenis_produk,
            'satuan'  => $request->satuan,
            'harga'  => $request->harga,
            'pasar'  => $request->pasar,
            'deskripsi_produk'  => $request->deskripsi_produk,
            'updated_at'  => date('YmdHis')
        ], $id_produk);
        if ($produkModel) {
            // Pesan Ketika Akun Berhasil 
            return redirect()->route('data.produk')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data.produk')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
