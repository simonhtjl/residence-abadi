<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranIuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_iurans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("iuran_id");
            $table->string("pemilikrumah");
            $table->string("jumlah");
            $table->string("bulan");
            $table->string("status")->default("belum bayar");
            $table->string("buktipembayaran");
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
        Schema::dropIfExists('pembayaran_iurans');
    }
}
