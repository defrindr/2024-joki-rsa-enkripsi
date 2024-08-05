<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksipenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksipenjualan', function (Blueprint $table) {
            $table->increments("id_transaksi");
            $table->unsignedInteger("id_penjual");
            $table->unsignedInteger("id_pelanggan");
            $table->integer("tanggal_transaksi");
            $table->integer("jumlah_galon");
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan');
            $table->foreign('id_penjual')->references('id_penjual')->on('penjualan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksipenjualan');
    }
}
