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
            $table->datetime('tanggal_waktu');
            $table->datetime('buka_regis');
            $table->datetime('tutup_regis');
            $table->string('tempat');
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
