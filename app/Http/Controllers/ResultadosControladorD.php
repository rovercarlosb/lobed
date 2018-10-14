<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resultado;
use App\Prueba;
use Laracasts\Flash\Flash;
use Barryvdh\DomPDF\Facade as PDF;



class ResultadosControladorD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultados = Resultado::orderBy('id', 'DESC')->paginate(5);
    
         $resultados->each(function($resultados){
         $resultados->user;
         $resultados->prueba;
        });

        return view('admin.resultados.index')->with('resultados', $resultados);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $pruebas = Prueba::Search($id)->first(); 
           $pruebas->each(function($pruebas){
            $pruebas->preguntas;
        });

        $my_preguntas = $pruebas->preguntas->pluck('id','pregunta');
        $my_opcion_1 = $pruebas->preguntas->pluck('id', 'opcion_1');
        $my_opcion_2 = $pruebas->preguntas->pluck('id', 'opcion_2');
        $my_opcion_3 = $pruebas->preguntas->pluck('id', 'opcion_3');
        $my_respuesta = $pruebas->preguntas->pluck('respuesta', 'id');
        
        
        return view('front.resultados.create')->with('pruebas',$pruebas)->with('my_preguntas', $my_preguntas)->with('my_opcion_1', $my_opcion_1)->with('my_opcion_2', $my_opcion_2)->with('my_opcion_3', $my_opcion_3)->with('my_respuesta', $my_respuesta);

    }

     public function create1($id)
    {

        $pruebas = Prueba::Search($id)->first(); 
           $pruebas->each(function($pruebas){
            $pruebas->preguntas;
            $pruebas->imagenes;
        });

        $my_preguntas = $pruebas->preguntas->pluck('id','pregunta');
        $my_opcion_1 = $pruebas->preguntas->pluck('id', 'opcion_1');
        $my_opcion_2 = $pruebas->preguntas->pluck('id', 'opcion_2');
        $my_opcion_3 = $pruebas->preguntas->pluck('id', 'opcion_3');
        $my_respuesta = $pruebas->preguntas->pluck('respuesta', 'id');
        $my_imagenes = $pruebas->imagenes->pluck('id','nombre');

        
        
        return view('front.resultados.create1')->with('pruebas',$pruebas)->with('my_preguntas', $my_preguntas)->with('my_opcion_1', $my_opcion_1)->with('my_opcion_2', $my_opcion_2)->with('my_opcion_3', $my_opcion_3)->with('my_respuesta', $my_respuesta)->with('my_imagenes', $my_imagenes);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
            $this->validate($request, [
        'respuesta_1' => 'required',
        'respuesta_2'    => 'required',
        'respuesta_3'   => 'required',
    ]);
   
        $id = \Auth::user()->id;   
        $resultado = new Resultado($request->all());
        $resultado->user_id = \Auth::user()->id;
       // $resultado->calificacion = "Excelente";


        $resultado1= $request->input('respuesta_1');
        $resultado2= $request->input('respuesta_2');
        $resultado3= $request->input('respuesta_3');
        $correcta1= $request->input('1');
        $correcta2= $request->input('2');
        $correcta3= $request->input('3');
    
//Todas Correctas
      if ($resultado1 == $correcta1 && $resultado2 == $correcta2 && $resultado3 == $correcta3 ) {
          $resultado->calificacion = "Excelente";

      }

// al menos dos Correctas
      elseif ($resultado1 != $correcta1 && $resultado2 == $correcta2 && $resultado3 == $correcta3) {
          $resultado->calificacion = "Muy bien, Puedes hacerlo mejor";        
      }

      elseif ($resultado1 == $correcta1 && $resultado2 != $correcta2 && $resultado3 == $correcta3) {
          $resultado->calificacion = " Muy bien, Puedes hacerlo mejor";        
      }

      elseif ($resultado1 == $correcta1 && $resultado2 == $correcta2 && $resultado3 != $correcta3) {
          $resultado->calificacion = "Muy bien ,Puedes hacerlo mejor";        
      }
//al menos una correcta

      elseif ($resultado1 != $correcta1 && $resultado2 != $correcta2 && $resultado3 == $correcta3) {
          $resultado->calificacion = "Regular";        
      }

      elseif ($resultado1 != $correcta1 && $resultado2 == $correcta2 && $resultado3 != $correcta3) {
          $resultado->calificacion = "Regular";        
      }

      elseif ($resultado1 == $correcta1 && $resultado2 != $correcta2 && $resultado3 != $correcta3) {
          $resultado->calificacion = "Regular";        
      }
    
//Todas Incorrectas 
    else{
        $resultado->calificacion = "Deficiente";        
    }

        
     $resultado->save();
    
        Flash::success("Se ha registrado tus resultados de esta prueba forma exitosa!");
        return redirect()->route('front.pruebasD.index');
    }

    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("mostrar");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
         $resultado = Resultado::find($id);
        $resultado->delete();

        $mensaje= 'EL resultado ha sido eliminada satisfactoriamente';

    if($request->ajax()){

            return $mensaje;
    
    } 
        Flash::error();
    }
    

     public function pdf()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $resultados = Resultado::all(); 

        $pdf = PDF::loadView('pdf.resultados', compact('resultados'));

        return $pdf->download('resultados.pdf');
    }
}





