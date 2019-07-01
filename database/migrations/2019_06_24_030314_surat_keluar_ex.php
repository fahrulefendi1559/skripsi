<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratKeluarEx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar_ex', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_periode')->unsigned();
            $table->string('nomorsurat');
            $table->string('pengirim');
            $table->string('penerima');
            $table->string('prihal');
            $table->date('tglsurat');
            $table->string('namafile');
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
        Schema::dropIfExists('surat_keluar_ex');
    }
}
