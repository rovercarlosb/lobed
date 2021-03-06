<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prueba;
use App\Pregunta;
use Laracasts\Flash\Flash;


class PruebasControlador extends Controller
{
    
    public function index()
    {
        $id1 = \Auth::user()->id;
        $pruebas = Prueba::orderBy('id', 'DESC')->where('type' ,'=','simple')->paginate(5);
        $pruebas1 = Prueba::orderBy('id', 'DESC')->where('user_id','=', $id1, "AND", "type", "=", "simple")->paginate(5);

        $pruebas->each(function($pruebas){
            $pruebas->user;
        });

        return view('admin.pruebas.index')->with('pruebas', $pruebas)->with('pruebas1', $pruebas1);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preguntas = Pregunta::orderBy('pregunta', 'ASC')->pluck('pregunta', 'id');
        return view('admin.pruebas.create')
            ->with('preguntas', $preguntas);
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
        'nombre' => 'required|unique:pruebas|max:120|min:3',
    ]);

        $prueba = new Prueba($request->all());
        $prueba->user_id = \Auth::user()->id;        
        $prueba->save();

        $prueba->preguntas()->sync($request->preguntas);


        Flash::success("Se ha registrado la prueba: ".'"'.$prueba->nombre.'"'." de forma exitosa!");
        return redirect()->route('pruebas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prueba = Prueba::find($id);
        $preguntas = Pregunta::orderBy('pregunta', 'DESC')->pluck('pregunta','id');

        $my_preguntas = $prueba->preguntas->pluck('id');


        return view('admin.pruebas.edit')
            ->with('prueba', $prueba)
            ->with('preguntas', $preguntas )
            ->with('my_preguntas', $my_preguntas);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prueba = Prueba::find($id);
        $prueba->fill($request->all());
        $prueba->save();

        $prueba->preguntas()->sync($request->preguntas);
        Flash::warning('Se ha editado la Prueba '.'"'. $prueba->nombre .'"'. ' de forma exitosa');
        return redirect()->route('pruebas.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id, Request $request)
    {
         $prueba = Prueba::find($id);
        $prueba->delete();

        $mensaje= 'La prueba '.$prueba->nombre.' ha sido eliminada satisfactoriamente';

    if($request->ajax()){

            return $mensaje;
    
    } 
        Flash::error();
    }
}
