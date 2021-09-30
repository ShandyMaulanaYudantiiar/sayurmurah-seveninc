<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**@return void*/
    public function run()
    {
        $faker = Faker::create('id_ID');
       //Tambah Akun Admin
        DB::table('admin')->insert([
            [
                'nama'      => "Andrea Santana Adzani",
                'email'     => "andrea@gmail.com",
                'foto'      => "profile.jpg",
                'telepon'   => "0123123121231",
                'akses'     => "0",
                'password'  => bcrypt('magangjogja')
            ],[
                'nama'      => "Dimas Fajrul Falah",
                'email'     => "dimas@gmail.com",
                'foto'      => "profile(1).jpg",
                'telepon'   => "0123123121232",
                'akses'     => "0",
                'password'  => bcrypt('magangjogja')
            ],[
                'nama'      => "Sayyidul",
                'email'     => "sayyid@gmail.com",
                'foto'      => "profile(2).jpg",
                'telepon'   => "0123123121233",
                'akses'     => "0",
                'password'  => bcrypt('magangjogja')
            ],[
                'nama'      => "Shandy Maulana Yudantiar",
                'email'     => "shandy@gmail.com",
                'foto'      => "profile(3).jpg",
                'telepon'   => "0123123121234",
                'akses'     => "0",
                'password'  => bcrypt('magangjogja')
            ],[
                'nama'      => "Magang Jogja",
                'email'     => "magangjogja@gmail.com",
                'foto'      => "profile(4).jpg",
                'telepon'   => "01231231212335",
                'akses'     => "0",
                'password'  => bcrypt('magangjogja')
            ],[
                'nama'      => "Admin Andrea",
                'email'     => "andreaadmin@gmail.com",
                'foto'      => "profile(5).jpg",
                'telepon'   => "0123123121236",
                'akses'     => "1",
                'password'  => bcrypt('magangjogja')
            ],[
                'nama'      => "Admin Dimas",
                'email'     => "dimasadmin@gmail.com",
                'foto'      => "profile(6).jpg",
                'telepon'   => "0123123121237",
                'akses'     => "1",
                'password'  => bcrypt('magangjogja')
            ],[
                'nama'      => "Sayyidul Admin",
                'email'     => "sayyidadmin@gmail.com",
                'foto'      => "profile(7).jpg",
                'telepon'   => "0123123121238",
                'akses'     => "1",
                'password'  => bcrypt('magangjogja')
            ],[
                'nama'      => "Shandy Admin",
                'email'     => "shandyadmin@gmail.com",
                'foto'      => "profile(8).jpg",
                'telepon'   => "0123123121239",
                'akses'     => "1",
                'password'  => bcrypt('magangjogja')
            ],[
                'nama'      => "Magang Jogja Admin",
                'email'     => "magangjogjaadmin@gmail.com",
                'foto'      => "profile(9).jpg",
                'telepon'   => "012312312123310",
                'akses'     => "0",
                'password'  => bcrypt('magangjogja')
            ],
        ]);
        // Daerah
        DB::table('daerah')->insert([
            [
                'nama_daerah'   => 'Bantul',
                'jumlah_pasar'  => 10,
            ],[
                'nama_daerah'   => 'Sleman',
                'jumlah_pasar'  => 10
            ],[
                'nama_daerah'   => 'Semarang',
                'jumlah_pasar'  => 10
            ],[
                'nama_daerah'   => 'Surabaya',
                'jumlah_pasar'  => 10
            ],[
                'nama_daerah'   => 'Bandung',
                'jumlah_pasar'  => 10
            ]
        ]);
        // Produk
        DB::table('produk')->insert([
            [
                'id_pasar'                  =>'1',
                'nama_produk'               =>'Sayur',
                'id_jenis_produk'           =>'1',
                'harga_produk'              => 5000,
                'satuan'                    => 'ikat',
                'deskripsi_produk'    => $faker->sentence,
                'foto_produk'         => 'sayur.png'
            ],[
                'id_pasar'                  =>'2',
                'nama_produk'               =>'Buah',
                'id_jenis_produk'           =>'2',
                'harga_produk'              => 50000,
                'satuan'                    => 'Kilogram',
                'deskripsi_produk'    => $faker->sentence,
                'foto_produk'               => 'buah.jpg'
            ]
        ]);
        // Jenis Produk
        DB::table('jenis_produk')->insert([
            [
                'jenis_produk'              => 'Bayam',
                'deskripsi_jenis_produk'    => $faker->sentence,
                'foto_jenis_produk'         => 'sayur.png'
            ],[
                'jenis_produk'              => 'Pisang',
                'deskripsi_jenis_produk'    => $faker->sentence,
                'foto_jenis_produk'         => 'buah.jpg'
            ],[
                'jenis_produk'              => 'Ayam',
                'deskripsi_jenis_produk'    => $faker->sentence,
                'foto_jenis_produk'         => 'daging.png'
            ],[
                'jenis_produk'              => 'Beras Bramo',
                'deskripsi_jenis_produk'    => $faker->sentence,
                'foto_jenis_produk'         => 'beras.png'
            ],[
                'jenis_produk'              => 'Telur Ayam Kampung',
                'deskripsi_jenis_produk'    => $faker->sentence,
                'foto_jenis_produk'         => 'telur.jpg'
            ],[
                'jenis_produk'              => 'Ikan Bawal',
                'deskripsi_jenis_produk'    => $faker->sentence,
                'foto_jenis_produk'         => 'ikan.png'
            ]
        ]);
        // Pasar
        for($i = 0; $i < 10; $i++){
            DB::table('pasar')->insert([
                [
                    'id_daerah'     => 1,
                    'nama_pasar'    => $faker->userName,
                    'alamat_pasar'  => $faker->address
                ],[
                    'id_daerah'     => 2,
                    'nama_pasar'    => $faker->userName,
                    'alamat_pasar'  => $faker->address
                ],[
                    'id_daerah'     => 3,
                    'nama_pasar'    => $faker->userName,
                    'alamat_pasar'  => $faker->address
                ],[
                    'id_daerah'     => 4,
                    'nama_pasar'    => $faker->userName,
                    'alamat_pasar'  => $faker->address
                ],[
                    'id_daerah'     => 5,
                    'nama_pasar'    => $faker->userName,
                    'alamat_pasar'  => $faker->address
                ]
            ]);
        }
        // User
        for($i = 0; $i <= 50; $i++){
            DB::table('user')->insert([[
                'nama_user' => $faker->name,
                'email'     => $faker->email,
                'telepon'   => "012312312123",
                'password'  => bcrypt('magangjogja'),
                'alamat'    => $faker->address
            ]]);
        }
    }
}