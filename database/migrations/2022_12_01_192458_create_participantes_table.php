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
        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            /*añado*/
            $table->string('nombre_participante');        
            $table->string('apellidos_participante');
            $table->string('dni_participante');
            $table->date('nacimiento_participante');
            $table->string('movil_participante');
            $table->unsignedBigInteger('cod_user');
            $table->foreign('cod_user')->references('id')->on('users')
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
        Schema::dropIfExists('participantes');
    }

    
};
