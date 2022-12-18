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
        Schema::create('plazos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            /*añado */
            $table->softDeletes();
            $table->string('tipo_plazo');
            $table->boolean('estado')->nullable();
            $table->unsignedBigInteger('editor');
            $table->foreign('editor')->references('id')->on('users')
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
        Schema::dropIfExists('plazos');
    }
};
