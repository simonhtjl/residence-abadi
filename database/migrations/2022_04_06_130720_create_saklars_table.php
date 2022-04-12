<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaklarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_saklar', function (Blueprint $table) {
            $table->id("saklar_id");
            $table->string("id_admin");
            $table->string("nm_saklar");
            $table->integer("nilai_saklar");
            $table->string("kategori");
            $table->string("lantai")->nullable();
            $table->date('tgl_saklar');
            $table->time('jam_saklar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_saklar');
    }
}
