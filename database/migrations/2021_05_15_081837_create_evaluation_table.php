<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('np_kasek');
            $table->string('np_kaun');
            $table->string('np_pegawai');
            $table->date('tgl_cek');
            $table->string('pesan_kasek')->default('Berdasarkan Hasil CK3 Bea Cukai terbaru anda tidak mengalami kelolosan. Terimakasih telah bekerja dengan sangat baik, pertahankan ketelitian dan produktifitas kinerja anda. Tetap Semangat!
            ');
            $table->string('pesan_kaun')->default('Berdasarkan Hasil CK3 Bea Cukai terbaru anda tidak mengalami kelolosan. Terimakasih telah bekerja dengan sangat baik, pertahankan ketelitian dan produktifitas kinerja anda. Tetap Semangat!
            ');
            $table->text('respon_pegawai')->nullable();
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
        Schema::dropIfExists('evaluation');
    }
}
