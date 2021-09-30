<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AkunController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\user\PasarController;
use App\Http\Controllers\user\DaerahController;
use App\Models\AkunModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* user */
Route::get('/', [HomeController::class, 'index'])->name('user.show');

Route::get('registrasi', function () {
    return view('userRegister');
});


// ADMIN
// Route ke Dashboard Admin
Route::get('admin/', [AdminController::class, 'index'])->name('admin.show');

// Route ke kelolaakun
Route::get('admin/akun',  [AkunController::class, 'index'])->name('kelolaakun');
// Route ke tambahakun
Route::get('admin/akun/tambah',  [AkunController::class, 'tambah'])->name('tambahakun');
// Route posts tambahakun
Route::post('admin/akun/tambah',  [AkunController::class, 'store'])->name('tambah');
// Route ke detailakun
Route::get('admin/akun/detail/{id}',  [AkunController::class, 'detail'])->name('detailakun');

//Pasar
Route::get('admin/pasar', [PasarController::class, 'index'])->name('data.pasar');
// Route ke Halaman Tambah Pasar
Route::get('admin/pasar/tambah', [PasarController::class, 'create'])->name('pasar.show');
// Route ke Function Tambah Pasar
Route::post('admin/pasar/tambah', [PasarController::class, 'store'])->name('tambah.pasar');
// Route ke halaman edit pasar
Route::get('admin/pasar/edit/{id_pasar}', [PasarController::class, 'edit'])->name('edit.pasar');
Route::post('admin/pasar/update/{id_pasar}', [PasarController::class, 'update'])->name('update.pasar');
// Route Delete
Route::get('admin/pasar/delete/{id_pasar}', [PasarController::class, 'delete'])->name('delete.pasar');

//Daerah
// data daerah
Route::get('admin/daerah', [DaerahController::class, 'index'])->name('data.daerah');
// Route ke Function Tambah daerah
Route::post('admin/daerah/tambah', [DaerahController::class, 'store'])->name('tambah.daerah');
// Route ke Halaman Tambah daerah Admin
Route::get('admin/daerah/tambah', [DaerahController::class, 'create'])->name('daerah.show');
// Route ke halaman edit daerah
Route::get('admin/daerah/edit/{id_daerah}', [DaerahController::class, 'edit'])->name('edit.daerah');
// Route ke function edit daerah
Route::post('admin/daerah/update/{id_daerah}', [DaerahController::class, 'update'])->name('update.daerah');
// Route delete
Route::get('admin/daerah/delete/{id_daerah}', [DaerahController::class, 'delete'])->name('delete.daerah');

// PRODUK
// Route ke Halaman Tambah Produk Admin
Route::get('admin/produk/tambah', [ProdukController::class, 'create'])->name('produk.show');
// Route ke Function Tambah Produk
Route::post('admin/produk/tambah', [ProdukController::class, 'store'])->name('tambah.produk');
// Data Produk
Route::get('admin/produk', [ProdukController::class, 'index'])->name('data.produk');
// Route delete
Route::get('admin/produk/delete/{id_produk}', [ProdukController::class, 'delete'])->name('delete.produk');
// Route ke halaman edit
Route::get('admin/produk/edit/{id_produk}', [ProdukController::class, 'edit'])->name('edit.produk');
// Route ke update edit
Route::get('admin/produk/update/{id_produk}', [ProdukController::class, 'update'])->name('update.produk');

// KATEGORI PRODUK
Route::get('admin/kategoriproduk/', [ProdukController::class, 'kategori'])->name('kategoriproduk');
// Route ke Halaman Tambah Produk Admin
Route::get('admin/kategoriproduk/tambah', [ProdukController::class, 'kcreate'])->name('vtambah.kategori');
// Route ke Function Tambah Produk
Route::post('admin/kategoriproduk/tambah', [ProdukController::class, 'kstore'])->name('tambah.kategori');
// Route delete
Route::get('admin/kategoriproduk/delete/{id_jenis}', [ProdukController::class, 'hapus'])->name('delete.jproduk');
// Route ke halaman edit
Route::get('admin/kategoriproduk/editkategori/{id_jenis}', [ProdukController::class, 'kedit'])->name('kedit.produk');
// Route ke update edit
Route::get('admin/kategoriproduk/edit/{id_jenis}', [ProdukController::class, 'kupdate'])->name('kupdate.produk');

//TRANSAKSI
//Route halaman transaksi
Route::get('admin/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
//Route halaman detail
Route::get('admin/transaksi/detail', [TransaksiController::class, 'detail'])->name('detail.trans');
//Route halaman laporan

// LOGIN & REGISTER
// Route ke Halaman Register
Route::get('register', [AuthController::class, 'showRegister'])->name('regis.show');
// Route ke function register / Daftar Auth
Route::post('register', [AuthController::class, 'Register'])->name('regis');
// Route ke Halaman Login
Route::get('login', [AuthController::class, 'showLogin'])->name('login.show');
// Route ke function Login
Route::post('login', [AuthController::class, 'Login'])->name('login');
// Route ke function Logout
Route::get('logout', [AuthController::class, 'Logout'])->name('logout');

//PROFILE
//Halaman profile
Route::get('admin/profile/{id_admin}', [AkunController::class, 'profile'])->name('profile.show');
Route::get('admin/profile/edit/{id_admin}', [AkunController::class, 'edit'])->name('edit.profile');



