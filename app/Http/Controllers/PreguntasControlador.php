<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use Laracasts\Flash\Flash;


class PreguntasControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $preguntas = Pregunta::Search($request->pregunta)->orderBy('id','DESC')->paginate(10);
        return view('admin.preguntas.index')->with('preguntas', $preguntas);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.preguntas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $pregunta = new Pregunta($request->all());
        $nombre = '¿ '. $pregunta->pregunta. ' ?';
        $pregunta->pregunta = $nombre;
        $pregunta->save();

        Flash::success('La pregunta '. $pregunta->pregunta .' ha sido registrada con exito !');
        return redirect()->route('preguntas.index');
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
        $pregunta = Pregunta::find($id);
        return view('admin.preguntas.edit')->with('pregunta', $pregunta);
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
        $pregunta = Pregunta::find($id);
        $pregunta->fill($request->all());
        $pregunta->save();
        Flash::warning('La pregunta ' . $pregunta->pregunta .' ha sido editada con exito');
        return redirect()->route('preguntas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
         $pregunta = Pregunta::find($id);
        $pregunta->delete();

        $mensaje = 'La pregunta '.$pregunta->pregunta.' ha sido eliminada satisfactoriamente';

    if($request->ajax()){

            return $mensaje;
    
    } 
        Flash::error();
        //return redirect()->route('articulos.index');
    }
}
