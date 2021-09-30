<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AkunModel;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AkunController extends Controller
{
    public function index()
    {
        $data_akun = AkunModel::all();
        return view('admin/kelolaakun/akun', compact('data_akun'));
        // return view('admin/kelolaakun/akun');
    }

    public function profile($id_admin)
    {
        $data = DB::table('admin')->where('id_admin', $id_admin)->first();
        // dd($data);
        return view('admin.profile.profile', compact('data'));
    }

    public function tambah()
    {
        return view('admin/kelolaakun/tambahakun');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //pesan error
        $message = [
            'required' => 'Kolom wajib diisi.',
            'unique' => 'Email sudah terdaftar, harap gunakan email yang lain.',
            'email' => 'Masukkan format email yang valid.',
            'numeric' => 'Masukan harus berupa angka.',
            'min' => 'Masukan tidak boleh kurang dari :min karakter',
            'max' => 'Masukan tidak boleh lebih dari :max karakter',
            'confirmed' => 'Konfirmasi password tidak sesuai dengan password'
        ];
        //form validation
        $this->validate(request(), [
            'nama'      => 'required',
            'email'     => 'required|unique:admin|email',
            'telepon'   => 'required|numeric|min:12',
            'password1' => 'required|min:6',
            'password2' => 'required',
            'foto'      => 'required|image'
        ], $message);

        //insert data to db
        $akun                   = new AkunModel;
        $akun->nama             = $request['nama'];
        $akun->email            = $request['email'];
        $akun->telepon          = $request['telepon'];
        $akun->password         = bcrypt($request['password1']);
        $akun->akses            = 0;
        $akun->status           = 1;
        // $akun->created_at       = date('YmdHis');
        // $akun->updated_at       = date('YmdHis');
        if ($image = $request->file('foto')) {
            $destinationPath = 'image/admin/akun/';
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $akun['foto'] = "$imageName";
        }
        $akun->save();

        if ($akun) {
            return redirect()->route('kelolaakun')->with(['success' => 'Data berhasil disimpan!']);
        } else {
            return redirect()->route('kelolaakun')->with(['error' => 'Data gagal disimpan!']);
        }
    }

    public function detail($id)
    {
        $data_akun = DB::table('admin')->where('id_admin', $id)->first();
        return view('admin/kelolaakun/detailakun', compact('data_akun'));
        // return var_dump($data_akun);
    }
}
