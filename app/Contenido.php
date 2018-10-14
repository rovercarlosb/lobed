<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Cviebrock\EloquentSluggable\SluggableInterface;
//use Cviebrock\EloquentSluggable\SluggableTrait;

class Contenido extends Model 
{
	protected $table = 'contenidos';

   protected $fillable = ['titulo','contenido','categoria_id','user_id'];

    public function categoria(){

    	return $this->belongsTo('App\Categoria');
    }

    public function imagenes(){
      return $this->hasMany('App\Imagen');
    }

    public function user(){

      return $this->belongsTo('App\User');

    }

     public function scopeSearch($query, $titulo){

    	return $query->where('titulo','LIKE',"%$titulo%");
    }
}
