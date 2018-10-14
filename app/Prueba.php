<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
	protected $table = "pruebas";

	protected $fillable = ['nombre','user_id','status'];
    
    public function preguntas(){

		return $this->belongsToMany('App\Pregunta');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function imagenes(){
      return $this->hasMany('App\Imagen');
    }

     public function resultado(){

    	return $this->hasOne('App\Prueba');
    }

     public function scopeSearch($query, $id){

        return $query->where('id','LIKE',"%$id%");
    }

}
