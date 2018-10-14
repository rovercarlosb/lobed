<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('preguntas', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('pregunta');
        //     $table->string('opcion_1');
        //     $table->string('opcion_2');
        //     $table->string('opcion_3');
        //     $table->string('respuesta');
        //     $table->timestamps();
        // });


        Schema::create('pregunta_prueba', function(Blueprint $table){

            $table->increments('id');
            $table->integer('prueba_id')->unsigned();
            $table->integer('pregunta_id')->unsigned();

            $table->foreign('prueba_id')->references('id')->on('pruebas')->onDelete('cascade');
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('cascade');

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
        // Schema::dropIfExists('preguntas');
        Schema::dropIfExists('pregunta_prueba');

    }
}
