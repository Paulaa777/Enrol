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
        Schema::create('preinscripcions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            /*añadido */
            $table->year('año_actividad');
            $table->string('plaza_obtenida')->nullable();
            $table->unsignedBigInteger('cod_usuario');
            $table->unsignedBigInteger('cod_participante');
            $table->unsignedBigInteger('cod_actividad');
            
            $table->foreign('cod_usuario')->references('id')->on('users');
            $table->foreign('cod_participante')->references('id')->on('participantes')
                ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('cod_actividad')->references('id')->on('actividads')
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
        Schema::dropIfExists('preinscripcions');
    }
};
