<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefectPikaiTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defect_pikai', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('np_user')->nullable();
            $table->string('nama_user')->nullable();
            $table->date('tgl_cek');
            $table->integer('holoMiss')->default(0);
            $table->integer('holoScratch')->default(0);
            $table->integer('holoReg')->default(0);
            $table->integer('printBlurTxt')->default(0);
            $table->integer('printBlurImg')->default(0);
            $table->integer('printSmear')->default(0);
            $table->integer('printSpot')->default(0);
            $table->integer('printUnder')->default(0);
            $table->integer('printOver')->default(0);
            $table->integer('colorUnderImg')->default(0);
            $table->integer('colorOverImg')->default(0);
            $table->integer('colorUnderTxt')->default(0);
            $table->integer('colorOverTxt')->default(0);
            $table->integer('colorNonUniform')->default(0);
            $table->integer('colorIncorrect')->default(0);
            $table->integer('cuttingMiss')->default(0);
            $table->integer('appearanceTear')->default(0);
            $table->integer('appearanceFolded')->default(0);
            $table->integer('appearancePlooi')->default(0);
            $table->integer('appearanceHole')->default(0);
            $table->integer('mixedProduct')->default(0);
            $table->integer('total_retur')->default(0);
            $table->timestamps();

            
            $table->foreign('np_user')
                    ->references('np_user')
                    ->on('profile')
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
        Schema::dropIfExists('defect_pikai');
    }
}
