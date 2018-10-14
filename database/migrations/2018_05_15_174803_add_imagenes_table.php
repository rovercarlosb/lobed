<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('contenido_id')->unsigned()->nullable();
            $table->integer('prueba_id')->unsigned()->nullable();


            $table->foreign('contenido_id')->references('id')->on('contenidos')->onDelete('cascade'); 
            $table->foreign('prueba_id')->references('id')->on('pruebas')->onDelete('cascade');

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
        Schema::dropIfExists('imagenes');
    }
}
