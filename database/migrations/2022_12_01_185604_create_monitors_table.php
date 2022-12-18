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
        Schema::create('monitors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
              /*añadido*/
            $table->string('nombre_monitor');
            $table->string('apellidos_monitor');
            $table->string('dni_monitor');
            $table->string('email_monitor');
            $table->string('movil_monitor');
            $table->unsignedBigInteger('cod_actividad');
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
        Schema::dropIfExists('monitors');
    }
};
