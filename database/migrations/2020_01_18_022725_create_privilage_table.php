<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivilageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('np');
            $table->integer('level');
            $table->timestamps();

            $table->foreign('np')
                    ->references('np')
                    ->on('accounts')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privilage');
    }
}
