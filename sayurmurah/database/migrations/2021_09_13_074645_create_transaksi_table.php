<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi')->index();
            $table->integer('id_user');
            $table->integer('id_status_transaksi');
            $table->date('tanggal_transaksi');
            $table->char('nama_user');
            $table->text('alamat_pengiriman');
            $table->integer('sub_total');
            $table->integer('total_bayar');
            $table->integer('total_kembali');
            $table->char('bukti_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
