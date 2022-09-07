<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulananMmeaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulanan_mmea', function (Blueprint $table) {
            $table->string('no_obc')->nullable();
            $table->biginteger('order')->nullable();
            $table->date('tgl_obc')->nullable();
            $table->date('tgl_jtempo')->nullable();
            $table->date('tgl_pakai_bb')->nullable();
            $table->date('tgl_cetak')->nullable();
            $table->date('tgl_verifikasi')->nullable();
            $table->date('tgl_kemas')->nullable();
            $table->integer('qty_pesan')->nullable();
            $table->integer('rencet')->nullable();
            $table->integer('jml_bb')->nullable();
            $table->integer('jml_cd')->nullable();
            $table->integer('total_bb')->nullable();
            $table->integer('jml_cetak')->nullable();
            $table->integer('baik_verifikasi')->nullable();
            $table->integer('rusak_verifikasi')->nullable();
            $table->integer('baik_hcts')->nullable();
            $table->integer('total_hcts')->nullable();
            $table->integer('kemas')->nullable();
            $table->integer('kirim')->nullable();
            $table->string('type');
            $table->string('jenis');
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
        Schema::dropIfExists('bulanan_mmea');
    }
}
