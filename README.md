link UI/UX
https://www.figma.com/file/rtdXdzq97j0kY6xWalQ2Jz/SayurMurah.com?node-id=0%3A1

**Fitur**

*SuperAdmin*

-Kelola Akun Admin      -> tambah, ubah status **Tambah Done**

-Kelola Akun Mitra      -> tambah, ubah status

-Kelola Akun User       -> tambah, ubah status **Tambah Done**

-Kelola Daerah          -> CRUD **Done**

-Kelola Pasar           -> CRUD **Done**

-Kelola Jenis Produk    -> CRUD **Done**

-Kelola Produk          -> CRUD **Done**

-Terima Pesanan         ->

-Cetak Laporan          ->


*Admin*

-Terima Pesanan ->

-Cetak Laporan  ->

-Kelola Pasar   -> CRUD **Done**

-Kelola Daerah  -> CRUD **Done**


*User*

-user home                  -> On Progress

-Keranjang                  ->

-Rating                     ->

-Transaksi                  ->

-Notifikasi Status Pesanan  ->

-Halaman proses Pemesanan   ->


*Mitra*

-Kelola Produk  -> CRUD **Done**

-Laporan Mitra  ->


**Alur Pemesanan**

user pesan -> user membayar -> user upload bukti bayar -> admin acc status -> pemesanan diproses


**Dokumentasi**

Only Laravel without jetstream

Masuk folder laravel -> sayurmurah


**USE**

*install composer

"composer install"

*Migrate Database

"php artisan migrate --seed"


**Menulis Template Admin**

@extends('admin.template')

@section('breadcrumb')

.... navigasi

@endsection

@section('statistik')

.... jika diperlukan

@endsection

@section('page-content')

.... konten utama

@endsection


***File** :

sayurmurah->database->migrations


**Dummy Seeder**

php artisan migrate --seed


***Tabel Database**:

-admin              :id_admin, nama, email, foto, telepon, password, id_akses, status, time_in_user

-daerah             :id_daerah, nama_daerah, jumlah_pasar

-detail_transaksi   :id_detail_transaksi, id_transaksi, id_produk, jumlah_transaksi, grand_total

-jenis_produk       :id_jenis_produk, jenis_produk, deskripsi_jenis_produk, foto_jenis_produk

-pasar              :id_pasar, id_daerah, nama_pasar, alamat_pasar, foto_pasar

-produk             :id_produk, id_pasar, nama_produk, id_jenis_produk, harga_produk, deksripsi_produk, foto_produk

-status_transaksi   :id_status_transaksi, status_transaksi

-transaksi          :id_transaksi, id_user, id_status_transaksi, tanggal_transaksi, nama_user, alamat_pengiriman, sub_total, total_bayar, total_kembali, bukti_bayar

-user               :id_user, akses, nama_user, username, email, password, telepon, alamat
