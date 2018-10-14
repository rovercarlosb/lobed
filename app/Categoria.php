<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

	 protected $fillable = [
        'nombre', 
    ];

	//protected $table = 'categorias';

   public function contenidos(){

   	return $this->hasMany('App\Contenido');
   }
    
    public function scopeSearch($query, $nombre){

    	return $query->where('nombre','LIKE',"%$nombre%");
    }

    public function scopeSearchCategoria($query, $nombre){

      return $query->where('nombre','=',"$nombre");
    }
}
