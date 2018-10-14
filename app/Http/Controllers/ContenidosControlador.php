<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use App\Contenido;
use App\Imagen;
use Laracasts\Flash\Flash;



class ContenidosControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id1 = \Auth::user()->id;
        $contenidos = Contenido::Search($request->titulo)->orderBy('id', 'DESC')->paginate(5);
        $contenidos1 = Contenido::Search($request->titulo)->orderBy('id', 'DESC')->where('user_id','=', $id1)->paginate(5);

        $contenidos->each(function($contenidos){

            $contenidos->categoria;
            $contenidos->user;
        });

        return view('admin.contenidos.index')->with('contenidos',$contenidos)->with('contenidos1', $contenidos1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre','ASC')->pluck('nombre','id');
        //dd($categorias);
        return view('admin.contenidos.create')->with('categorias',$categorias);
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
        'titulo' => 'required|unique:contenidos|max:120|min:3',
        'categoria_id'    => 'required',
        'contenido'   => 'min:60|required',
        'image'           => 'max:3',

    ]);

        $contenido = new Contenido($request->all());
        $contenido->user_id = \Auth::user()->id;        
        $contenido->save();

        if ($request->file('image')) {
            
        $files= $request->file('image');
        $path = public_path().'/imagenes/articulos/';
        
        $i=1;
        
        foreach ($files as $file ) {
        
        $name = "Blog_LOBED_".$i. time(). '.'.$file->getClientOriginalExtension();
        $file->move($path,$name);
        $imagen = new Imagen();
        $imagen->nombre = $name;
        $imagen->contenido()->associate($contenido);
        $imagen->save();

        $i++;
        }
    }
    
         Flash::success("Se ha registrado el Contenido: ".$contenido->titulo." de forma exitosa!");
        return redirect()->route('contenidos.index');
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
        $contenido = Contenido::find($id);
        $contenido->categoria->id;
        $categorias = Categoria::orderBy('nombre','DESC')->pluck('nombre','id');

        return view('admin.contenidos.edit')->with('categorias',$categorias)->with('contenido',$contenido);
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
        $contenido = Contenido::find($id);
        $contenido->fill($request->all());
        $contenido->save();

        Flash::warning('El Contenido '.$contenido->titulo.' ha sido modificado satisfactoriamente');
        return redirect()->route('contenidos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,Request $request)
    {
        $contenido = Contenido::find($id);
        $contenido->delete();

        $mensaje= 'El articulo '.$contenido->titulo.' ha sido eliminado satisfactoriamente';

    if($request->ajax()){

            return $mensaje;
    
    } 
        Flash::error();
        //return redirect()->route('articulos.index');
    

    }
}
