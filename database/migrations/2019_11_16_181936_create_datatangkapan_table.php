<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatatangkapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datatangkapan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nelayan')->nullable();
            $table->string('umurnelayan')->nullable();
            $table->string('jenisnelayan')->nullable();
            $table->string('jenisTCT');
            $table->integer('hargaTCT');
            $table->integer('bobotTCT');
            $table->string('kategori');
            // $table->string('jenisIkanLainnya')->nullable();
            // $table->integer('hargaIkanLainnya')->nullable();
            // $table->integer('bobotIkanLainnya')->nullable();
            $table->string('alattangkap')->nullable();
            $table->string('jeniskapal')->nullable();
            // $table->string('jenisIkanLainnya')->nullable();
            $table->string('namakapal')->nullable();
            $table->string('nokapal')->nullable();
            $table->integer('jumlahABK')->nullable();
            $table->string('dpi')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('tempatpendaratanikan')->nullable();
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
        Schema::dropIfExists('datatangkapan');
    }
}
