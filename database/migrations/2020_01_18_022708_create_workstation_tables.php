<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkstationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workstation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('station');
            $table->foreignId('id_unit')
                    ->constrained('unit')
                    ->onUpdate('cascade')
                    ->onDelete('no action')
                    ->default(1);
            $table->foreignId('id_seksi')
                    ->constrained('seksi')
                    ->onUpdate('cascade')
                    ->onDelete('no action')
                    ->default(1);
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
        Schema::dropIfExists('workstation');
    }
}
