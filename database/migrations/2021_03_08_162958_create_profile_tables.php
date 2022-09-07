<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('foto')->default('default-avatar.png');
            $table->string('np_user');
            $table->string('nama');
            $table->string('email');
            $table->date('tgl_lahir');
            $table->text('alamat')->nullable();
            $table->string('contact')->nullable();
            $table->foreignId('id_seksi')->constrained('seksi');
            $table->foreignId('id_unit')->constrained('unit');
            $table->foreignId('id_station')->constrained('workstation');
            $table->timestamps();

            
            $table->foreign('np_user')
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
        Schema::dropIfExists('profile');
    }
}
