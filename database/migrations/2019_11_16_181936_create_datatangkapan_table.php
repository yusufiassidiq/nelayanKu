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
            $table->string('jenis');
            $table->integer('jumlah');
            $table->string('alattangkap')->nullable();
            $table->string('jeniskapal')->nullable();
            $table->string('dpi')->nullable();
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
