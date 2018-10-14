<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
   protected $table = "imagenes";

   protected $fillable = ['nombre','contenido_id', 'prueba_id'];

    public function contenido(){

   	return $this->belongsTo('App\Contenido');
   }

    public function prueba(){

   	return $this->belongsTo('App\Prueba');
   }

}
