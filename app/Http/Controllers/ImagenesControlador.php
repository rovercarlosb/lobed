<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;

class ImagenesControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = Imagen::all();
        $imagenes->each(function($imagenes){

            $imagenes->articulo;

        });

        
        return view('admin.imagenes.index')->with('imagenes', $imagenes);

    }

   
}
