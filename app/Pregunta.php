<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'preguntas';


   protected $fillable = ['pregunta','opcion_1','opcion_2','opcion_3', 'respuesta'];

   public function pruebas(){

		return $this->belongsToMany('App\Prueba')->withTimestamps();
   }

      public function scopeSearch($query, $pregunta){

    	return $query->where('pregunta','LIKE',"%$pregunta%");
    }


}
