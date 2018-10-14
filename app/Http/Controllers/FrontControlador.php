<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contenido;
use Carbon\Carbon;
use App\Categoria;
use App\Imagen;
use App\Prueba;
use App\Resultado;
use Illuminate\Support\Collection as Collection;

class FrontControlador extends Controller
{
   public function __construct(){

        Carbon::setlocale('es');
   }

    public function index()
    {
        
        $contenidos = Contenido::orderBy('id', 'ASC')->paginate(3);
        
        $contenidos->each(function($contenidos){
                $contenidos->categoria;
                $contenidos->imagenes;
        });


        $imagen = Imagen::latest('id')->first();

        $last = Contenido::latest('id')->first();
        
        return view('front.index')->with('contenidos', $contenidos)->with('last',$last);

    }

    public function ViewTcontenidos()
    {
        
        $contenidos = Contenido::orderBy('id', 'ASC')->paginate(3);
        
        $contenidos->each(function($contenidos){
                $contenidos->categoria;
                $contenidos->imagenes;
        });


        $imagen = Imagen::latest('id')->first();

        $last = Contenido::latest('id')->first();
        
        return view('front.contenidos.index')->with('contenidos', $contenidos)->with('last',$last);

    }


    public function searchCategory($nombre)
    {

        $categoria = Categoria::searchCategoria($nombre)->first();

        $articulos = $categoria->articulos()->paginate(4);
        $articulos->each(function($articulos){
            $articulos->categoria;
            $articulos->imagen;
        });

         return view('front.index')->with('articulos',$articulos);

    }

    public function ViewContenido($titulo){

        $contenido = Contenido::Search($titulo)->first(); 
           $contenido->each(function($contenido){
            $contenido->categoria;
            $contenido->imagenes;
        });

        $my_imagenes = $contenido->imagenes->pluck('id','nombre');
       
        return view('front.contenido')->with('contenido', $contenido)->with('my_imagenes', $my_imagenes);

    }



    public function ViewPruebas(){

         $pruebas = Prueba::where('status','=','encendido')->where('type' ,'=','simple')->get();
        
        $pruebas->each(function($pruebas){
                $pruebas->user;
        });


        $last =Prueba::latest('id')->where('type' ,'=','simple')->first();
        $last1 = $last->id;


        $id1 = \Auth::user()->id;

        $resultado = Resultado::latest('id')->where('user_id','=', $id1)->first();
                
        $res= 0;
        if ($resultado == null) {
            $resultado = 0;
        }
        else{
        $res = $resultado->prueba_id;
        }
        $sta = $pruebas->pluck('status');
        return view('front.pruebas.index')->with('pruebas', $pruebas)->with('res', $res)->with('id1',$id1)->with('last1',$last1);

    }

    public function ViewPruebasD(){

         $pruebas = Prueba::where('status','=','encendido')->where('type' ,'=','didactica')->get();
        
        $pruebas->each(function($pruebas){
                $pruebas->user;
                $pruebas->imagenes;
        });


        $last =Prueba::latest('id')->where('type' ,'=','didactica')->first();
        $last1 = $last->id;


        $id1 = \Auth::user()->id;

        $resultado = Resultado::latest('id')->where('user_id','=', $id1)->first();
                
        $res= 0;
        if ($resultado == null) {
            $resultado = 0;
        }
        else{
        $res = $resultado->prueba_id;
        }
        $sta = $pruebas->pluck('status');
        return view('front.pruebasD.index')->with('pruebas', $pruebas)->with('res', $res)->with('id1',$id1)->with('last1',$last1);

    }

      public function ViewResultados(){

        $id1 = \Auth::user()->id;

        $resultados = Resultado::where('user_id','=' ,$id1)->get();
        // $resultados = Resultado::orderBy('id', 'DESC')->paginate(5);

         $resultados->each(function($resultados){
         $resultados->user;
         $resultados->prueba;
         });

        $resultados1 = Resultado::where('calificacion','=' ,'Excelente')->get();

         $resultados1->each(function($resultados1){
         $resultados1->user;
         $resultados1->prueba;
         });



        $res = $resultados->pluck('user_id');
        $res1 = $resultados1->pluck('user_id');
        return view('front.resultados.index')->with('resultados', $resultados)->with('res', $res)->with('id1',$id1)->with('res1',$res1);

    }
}