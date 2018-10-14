<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $table = "resultados";

    protected $fillable = ['respuesta_1', 'respuesta_2', 'respuesta_3', 'calificacion', 'user_id', 'prueba_id'];

    public function prueba(){

    	return $this->belongsTo('App\Prueba');
    }

    public function user(){

    	return $this->belongsTo('App\User');
    }
}

