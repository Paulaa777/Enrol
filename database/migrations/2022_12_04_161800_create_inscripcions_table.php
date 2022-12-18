<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            /*añadido */
            $table->year('año_actividad');
            $table->integer('precio');
            $table->boolean('pagada')->nullable();
            $table->unsignedBigInteger('c_usuario');
            $table->unsignedBigInteger('c_participante');
            $table->unsignedBigInteger('c_actividad');
            
            $table->foreign('c_usuario')->references('id')->on('users') 
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('c_participante')->references('id')->on('participantes')
                ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('c_actividad')->references('id')->on('actividads')
                ->onDelete('cascade')->onUpdate('cascade');
            
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripcions');
    }
};
