<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id_admin')->index();
            $table->char('nama');
            $table->char('email')->unique();
            $table->char('foto')->nullable();
            $table->char('telepon');
            $table->char('password');
            $table->integer('akses')->comment('0= SuperAdmin, 1= Admin, 2= User, 3= Mitra');
            $table->integer('status')->default(1)->comment('0= Tidak Aktif, 1= Aktif');
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
        Schema::dropIfExists('admin');
    }
}
