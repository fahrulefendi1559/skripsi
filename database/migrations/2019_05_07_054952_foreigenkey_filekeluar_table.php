<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeigenkeyFilekeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filekeluar', function (Blueprint $table) {
            $table->foreign('id_suratkeluar')->references('id')->on('surat_keluar')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('filekeluar', function (Blueprint $table) {
            //
        });
    }
}
