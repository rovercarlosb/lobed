<?php 

	
namespace App\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use App\Categoria;
use App\Articulo;

class AsideComposer{

	public function compose(View $view){
	

		$categorias	= Categoria::all();
		$view->with('categorias',$categorias);	
	}

	public function compose1(View $view){


		$articulos = Articulo::all();
		$view->with('articulos', $articulos);
		

	}

}