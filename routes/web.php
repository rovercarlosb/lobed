<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
 //   return view('welcome');
//});

/*Route::get("/", "MiControlador@index");
Route::get("/crear", "MiControlador@create");
Route::get("/mostrar", "MiControlador@show");
Route::get("/articulos", "MiControlador@store");
Route::get("/contactos", "MiControlador@contactar");
*/

/*Route::get("/insertar", function(){


	DB::insert("INSERT INTO articulos (NOMBRE_ARTICULO, PRECIO, PAIS_ORIGEN, OBSERVACIONES) VALUES(?,?,?,?)",["Cable",15,2,"Venezuela", "De cilicon"]);
});



Route::get("/leer", function(){


	$resultados = DB::select("SELECT * from articulos WHERE id=1",[1]);

	foreach ($resultados as $articulo ) {
		
		return $articulo->nombre_articulo;
	}

});



Route::get("/actualiza", function(){


	DB::update("UPDATE articulos SET nombre_articulo= 'mesa' WHERE id=?",[1]);
});



Route::get("/eliminar", function(){


	DB::delete("DELETE from articulos WHERE id=?",[1]);
});*/

Route:: get("/leer",function(){

	$articulos=\App\Articulo::all();

	foreach($articulos as $articulo) {
		
		echo $articulo->nombre_articulo;
	}
});

//Rutas de PDF

Route::get('descargar-resultados', 'ResultadosControlador@pdf')->name('resultados.pdf');


//RUTAS DEL FRONTEND

Route::get('/',['as' => 'front.index' , 'uses' => 'FrontControlador@index', 'middleware' => 'auth']);

Route::get('pruebas',['as' => 'front.pruebas.index' , 'uses' => 'FrontControlador@ViewPruebas', 'middleware' => 'auth']);

Route::get('contenidos',['as' => 'front.contenidos.index' , 'uses' => 'FrontControlador@ViewTcontenidos', 'middleware' => 'auth']);

Route::get('pruebasD',['as' => 'front.pruebasD.index' , 'uses' => 'FrontControlador@ViewPruebasD', 'middleware' => 'auth']);

Route::get('progreso',['as' => 'front.resultados.index' , 'uses' => 'FrontControlador@ViewResultados', 'middleware' => 'auth']);

Route::get('categorias/{nombre}', [

		'uses' => 'FrontControlador@searchCategory',
		'as'   => 'front.search.categoria', 
		'middleware' => 'auth'
	]);

Route::get('contenidos/{titulo}', [

		'uses' => 'FrontControlador@ViewContenido',
		'as'   => 'front.view.contenido',
		'middleware' => 'auth'
	]);


Route::get('pruebas/{id}', [  //Ruta para eliminar resultados

		'uses' => 'ResultadosControlador@create',
		'as'   => 'front.view.resultados.create',
	]);

Route::get('pruebasD/{id}', [  //Ruta para eliminar resultados

		'uses' => 'ResultadosControladorD@create1',
		'as'   => 'front.view.resultados.create1',
	]);



// RUTAS DELPANEL DE ADMINISTRACION
Route::group(['prefix' => 'admin' ,'middleware' => 'auth'], function(){

	

	Route::get('/', [
		'as'   => 'admin.index', function(){
			return view('admin.index');
		}
	]);



	Route::resource('users','UsuariosControlador');
	Route::get('users/{id}',[ //Ruta para eliminar usuario

		'uses' => 'UsuariosControlador@destroy',
		'as'   => 'admin.users.destroy'
	]);


	Route::resource('categorias','CategoriasControlador');
	Route::get('categorias/{id}/destroy', [

		'uses' => 'CategoriasControlador@destroy',
		'as'   => 'admin.categorias.destroy'
	]);
	
	Route::resource('contenidos','ContenidosControlador');
	Route::get('contenidos/{id}', [  //Ruta para eliminar usuarios

		'uses' => 'ContenidosControlador@destroy',
		'as'   => 'admin.contenidos.destroy'
	]);
	
	Route::resource('preguntas','PreguntasControlador');
	Route::get('preguntas/{id}', [  //Ruta para eliminar preguntas

		'uses' => 'PreguntasControlador@destroy',
		'as'   => 'admin.preguntas.destroy'
	]);

	Route::resource('pruebas','PruebasControlador');
	Route::get('pruebas/{id}', [  //Ruta para eliminar pruebas

		'uses' => 'PruebasControlador@destroy',
		'as'   => 'admin.pruebas.destroy'
	]);

	Route::resource('pruebasD','PruebaDControlador');
	Route::get('pruebasD/{id}', [  //Ruta para eliminar pruebas

		'uses' => 'PruebaDControlador@destroy',
		'as'   => 'admin.pruebasD.destroy'
	]);

	Route::resource('resultados','ResultadosControlador');
	Route::resource('resultadosD','ResultadosControladorD');

	Route::get('resultados/{id}', [  //Ruta para eliminar resultados

		'uses' => 'ResultadosControlador@destroy',
		'as'   => 'admin.resultados.destroy'
	]);

	Route::get('imagenes', [

		'uses' => 'ImagenesControlador@index',
		'as'   => 'admin.imagenes.index'
	]);

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

