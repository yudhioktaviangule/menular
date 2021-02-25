<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_ujians', function (Blueprint $table) {
            $table->id();
            $table->integer('materi_id')->comment("0 jika jenis soal q(QUIZ)");
            $table->integer('bab_materi_id')->comment("0 jika jenis soal latihan atau tryout");
            $table->enum('jenis',['q','latihan','tryout']);
            $table->longtext("isi");
            $table->longtext("json");
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('soal_ujians');
    }
}
