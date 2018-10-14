@extends('front.template.main')

@section('title', 'Mi Progreso')

@section('head', 'Mi progreso')
	 
@section('contenido')

<div class="blog-area">
	<div class="container">
		<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h2 style="color: white; text-align: center;">Resultados de tus pruebas </h2>
		</div>
			<div class="card-body">
	<table class="table table-striped">
		<thead style="color: #070707;">
			<th>Codigo de Prueba</th>
			<th>Nombre</th>
			<th>Nombre de la Prueba</th>
			<th>Tu Calificación</th>
		</thead>		
		<tbody>
			@foreach($resultados as $resultados)
				<tr data-id="{{$resultados->id}}" class="text-white">
					<td>{{$resultados->id}}</td>
					<td>{{$resultados->user->name}}</td>
					<td>{{$resultados->prueba->nombre}}</td>
					<td>{{$resultados->calificacion}}</td>
				</tr>
				@endforeach
		</tbody>
	</table>
	</div>
</div>

<div class="row justify-content-around">
    <div class="col-4">
<div class="card text-white mb-3 mt-3" style="background-color: rgba(24,145,48); width: 350px;">
		<div class="card-header">
			<h3 style="color: white; text-align: center;">Calificación por resultados</h3>
		</div>
			<div class="card-body">
	<table class="table table-striped">
		<thead class="text-white">
			<th>Preguntas Correctas</th>
			<th>Calificacion</th>
			<th></th>
		</thead>		
		<tbody>
				<tr>
					<td>3 Correctas</td>
					<td>Excelente</td>
					<td><i class="fas fa-star fa-3x" style="color: #EDBB0D;"></i></td>
				</tr>
				<tr>
					<td>2 Correctas</td>
					<td>Muy bien, puedes hacerlo mejor</td>
					<td><i class="fas fa-check-circle fa-3x" style="color:#0C7409"></i></td>
				</tr>
				<tr>
					<td>1 Correcta</td>
					<td>Regular</td>
					<td><i class="fab fa-angellist fa-3x" style="color: #E86F0E;"></i></td>
				</tr>
				<tr>
					<td>Ninguna Correcta</td>
					<td>Deficiente</td>
					<td><i class="fas fa-times-circle fa-3x" style="color: #F3050B"></i></td>
				</tr>
		</tbody>
	</table>
</div>
</div>
</div>

	<div class="text-center">
		</div>
		@php
			$conteo = count($res,0);
			$conteo2 = count($res1,0);
		@endphp

<div class="col-4">
<ul class="list-group mt-3" style="border: 2px dashed black;">
  <li class="list-group-item d-flex justify-content-between align-items-center">
	<h5>Pruebas realizadas</h5>
    <span class="badge badge-primary badge-pill">{!!$conteo!!}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
	<h5>Pruebas de Excelencia</h5>
    <span class="badge badge-primary badge-pill">{!!$conteo2!!}</span>
  </li>
</ul>
</div>
</div>


	</div>
</div>
</div>


 @include('front.template.partes.footer')


@endsection