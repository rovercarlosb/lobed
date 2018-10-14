<?php 

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password','type','age',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin(){

        return $this->type === 'admin';
    }

    public function dirigente(){

        return $this->type === 'dirigente';
    }

    public function contenidos(){

        return $this->hasMany('App\Contenido');

    }

    public function resultados(){
        return $this->hasMany('App\Resultado');
    }

    public function pruebas(){

        return $this->hasMany('App\Prueba');
    }
}
  //

