<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_ujians', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_ujian');
            $table->date('tanggal_selesai');
            $table->integer('waktu_ujian')->comment('Jumlah detik'); 
            $table->date('buka_regis');
            $table->date('tutup_regis');
            $table->string('jenis')->default('Daring');
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
        Schema::dropIfExists('jadwal_ujians');
    }
}
