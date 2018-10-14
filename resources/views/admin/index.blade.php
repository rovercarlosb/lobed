@extends('admin.template.main')


@section('title') 

Panel de administración    
@endsection

@section('contenido') 

<div class="container" style="margin-top: 10px;">
	<div class="card-deck">
  		<div class="card border-primary mb-3">
    <div class="card-body">
      <a href="{{ route('contenidos.index') }}"><h2 style="text-align:center;">Contenidos</h2></a>
		  <p class="card-text">Registra aqui nuevo contenido para los lobatos, edita y elimina los contenidos subidos</p>
      <figure>
      <i class="fas fa-book fa-5x" style="color: rgba(24,145,48);"></i>
      </figure>
    </div>
  </div>
  <div class="card border-primary mb-3">
    <div class="card-body">
		<a href="{{ route('categorias.index') }}"><h2 style="text-align:center;">Categorias</h2></a>
		  <p class="card-text">Crea nuevas categorias para tus contenidos</p>	
		  <figure>
	      <i class="fas fa-chalkboard-teacher fa-5x" style="color: rgba(24,145,48);"></i>
	      </figure>	
    </div>
  </div>
  <div class="card border-primary mb-3">
    <div class="card-body">
		<a href="{{ route('users.index') }}"><h2 style="text-align:center;">Usuarios</h2></a>
		  <p class="card-text">Aqui podras registrar a los lobatos de tu grupo scout</p>
		  <figure>
      		<i class="fas fa-users fa-5x" style="color: rgba(24,145,48);"></i>
      	  </figure>
    </div>
  </div>
</div>

</div>

<div class="container" style="margin-top: 10px;">
	<div class="card-deck">
  		<div class="card border-primary mb-3">
    <div class="card-body">
      <a href="{{ route('resultados.index') }}"><h2 style="text-align:center;">Resultados</h2></a>
		  <p class="card-text">Visualiza aqui los resultados de las pruebas de cada uno de los lobatos</p> 
		  <figure>
	      	<i class="fas fa-star fa-5x" style="color: rgba(24,145,48);"></i>
	      </figure>     
    </div>
  </div>
  <div class="card border-primary mb-3">
    <div class="card-body">
		<a href="{{ route('preguntas.index') }}"><h2 style="text-align:center;">Preguntas</h2></a>
		  <p class="card-text">Crea aqui las preguntas que usaras en tus evaluaciones</p>
		  <figure>
	      	<i class="fas fa-question fa-5x" style="color: rgba(24,145,48);"></i>
	      </figure>		
    </div>
  </div>
  <div class="card border-primary mb-3">
    <div class="card-body">
    <a href="{{ route('pruebas.index') }}"><h2 style="text-align:center;">Pruebas Selección simple</h2></a>
      <p class="card-text">Crea nuevas pruebas para los lobatos aqui de seleccion de respuestas</p>
      <figure>
          <i class="fas fa-edit fa-5x" style="color: rgba(24,145,48);"></i>
        </figure>   
    </div>
  </div>
</div>

<center>
<div class=" card-deck container" style="margin-top: 10px; width: 20rem;">
    <div class="card border-primary mb-3 " style="width: 18rem">
    <div class="card-body">
      <a href="{{ route('pruebasD.index') }}"><h3 style="text-align:center;">Pruebas Didacticas</h3></a>
      <p class="card-text text-center">Crea aqui evaluaciones con imagenes para los lobatos mas pequeños</p> 
      <figure>
          <i class="fas fa-edit fa-5x" style="color: rgba(24,145,48);"></i>
        </figure>
    </div>
  </div>
  </center>


</div>
    
@endsection


