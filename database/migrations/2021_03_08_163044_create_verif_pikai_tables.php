<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifPikaiTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verif_pikai', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('np_user');
            $table->string('nama_user');
            $table->date('tgl_verif');
            $table->integer('jml_rim')->nullable()->default(0);
            $table->integer('jml_lembar')->nullable()->default(0);
            $table->integer('jml_obc')->nullable()->default(0);
            $table->integer('target')->default(30);
            $table->string('lembur')->default('-');
            $table->text('keterangan')->nullable();
            $table->integer('validation')->default(0);
            $table->timestamps();

            
            $table->foreign('np_user')
                    ->on('profile')
                    ->references('np_user')
                    ->onDelete('no action')
                    ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verif_pikai');
    }
}
