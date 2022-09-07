<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimanPikaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman_pikai', function (Blueprint $table) {
            $table->id()->unique();
            $table->date('tgl_kirim')->unique();
            $table->integer('kirim_np')->default(0);
            $table->integer('kirim_p')->default(0);
            $table->integer('kirim_mmea')->default(0);
            $table->integer('kirim_hptl')->default(0);
            $table->integer('total_pcht')->default(0);
            $table->integer('total_mmea')->default(0);
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
        Schema::dropIfExists('pengiriman_pikai');
    }
}
