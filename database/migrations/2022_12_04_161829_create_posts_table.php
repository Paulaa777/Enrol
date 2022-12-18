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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            /*añado*/
            $table->string('tipo');  
            $table->text('titulo');        
            $table->longText('comentario');
            $table->boolean('archivado')->nullable();
            $table->unsignedBigInteger('autor');
            $table->foreign('autor')->references('id')->on('users')
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
        Schema::dropIfExists('posts');
    }
};
