<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Tampilkan file Login
    public function showLogin()
    {
        // Cek menggunakan library Auth
        if (Auth::check()) {
            //Login Success
            return redirect()->route('admin.show');
        }
        return view('userLogin');
    }

    // Proses Login Menggunakan Library Auth
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('user.show');
        }

        return redirect()->route('login.show')->with([
            'loginError' => 'email atau Password salah',
        ]);
    }

    /*<--------------------------------------- BATAS ------------------------------------------->*/

    // Tampilkan Register
    public function showRegister()
    {
        return view('userRegister');
    }

    // Proses Registrasi User
    public function Register(Request $request)
    {
        // FormRequst Validasi Registrasi akun
        $request->validate([
            'nama'      => 'required',
            'alamat'    => 'required',
            'password'  => 'required',
            'email'     => 'required|email'
        ]);

        // Memasukkan data ke Database
        $user               = new User;
        $user->nama_user    = $request->nama;
        $user->password     = bcrypt($request->password);
        $user->email        = $request->email;
        $user->alamat       = $request->alamat;
        $user->telepon      = $request->telepon;
        $user->save();

        // Pesan Ketika berhasil Register Akun dan Gagal Register Akun
        if ($user) {
            // Pesan Ketika Akun Berhasil dibuat dan redirect ke Halaman Login untuk login
            return redirect()->route('login.show')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('regis.show')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    // Function Logout
    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Kembali ke halaman Login
        return redirect()->route('login.show');
    }
}
