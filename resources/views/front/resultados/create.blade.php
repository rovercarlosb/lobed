@extends('front.template.main')

@section('title', 'Prueba')

@section('head', $pruebas->nombre)
	 
@section('contenido')

<div class="blog-area">

  <div class="container">
	
	<h1 class="text-uppercase" style="text-align: center;">{!!$pruebas->nombre!!}</h1>

	<h2 class="text-muted" style="text-align: center;">Responde cada una de las preguntas a continuación</h2>

		

		{!!Form::open(['route' => 'resultados.store', 'method' => 'POST', 'class' => 'form-inline', 'id' => 'form1'])!!}
		
		{{-- Recorrido de preguntas --}}



		@php 
		$tpreguntas = array();
		$i=0;
		@endphp
		@foreach($my_preguntas as $id => $pregunta)
	
			@php 
			$tpreguntas[] = $id;
			$i++;
			@endphp

		@endforeach


		{{-- Recorrido de opcion 1 --}}
		@php 
		$topcion1 = array();
		$i1=0;
		@endphp
		@foreach($my_opcion_1 as $id1 => $opcion_1)
	
			@php 
			$topcion1[] = $id1;
			$i1++;
			@endphp

		@endforeach

		{{-- Recorrido de ocpcion 2 --}}
		@php 
		$topcion2 = array();
		$i2=0;
		@endphp
		@foreach($my_opcion_2 as $id => $opcion_2)
	
			@php 
			$topcion2[] = $id;
			$i2++;
			@endphp

		@endforeach

		{{-- Recorrido de ocpcion 3 --}}
		@php 
		$topcion3 = array();
		$i3=0;
		@endphp
		@foreach($my_opcion_3 as $id => $opcion_3)
	
			@php 
			$topcion3[] = $id;
			$i3++;
			@endphp

		@endforeach

		{{-- Recorrido de opcion correcta --}}
		@php 
		$tcorrecta = array();
		$i4=0;
		@endphp
		@foreach($my_respuesta as $respuesta => $id)
	
			@php 
			$tcorrecta[] = $id;
			$i4++;
			@endphp
		@endforeach
		
@php
	$valores = array();
	$x=0;
	while ($x<3) {
 		 $num_aleatorio = rand(0,6);
  		if (!in_array($num_aleatorio,$valores)) {
    	array_push($valores,$num_aleatorio);
    	$x++;
 		 }
		}

@endphp
<div class="card-deck">
<div class="card text-white bg-success mb-3 mt-3">
  <div class="card-header">
	<h3>Pregunta #1</h3>
  </div>
  <div class="card-body">
	<div class="container mb-10">
			{!! Form::label('respuesta_1', $tpreguntas[$valores[0]] , ['style' => 'font-size: 20px; text-align: center; color: white;text-transform: uppercase;', 'class' => 'stroke'])!!}
			<br>
			<div class="radio">
					
  					<span style="font-size: 20px"> A) {{$topcion1[$valores[0]]}}</span>			
  					{{ Form::radio('respuesta_1','A', true)}} 
			</div>
			<br>

			<div class="radio">
					
					<span style="font-size: 20px">B) {{$topcion2[$valores[0]]}}</span>			
					{{ Form::radio('respuesta_1','B' )}} 
			</div>
			<br>
			<div class="radio">
					
					<span style="font-size: 20px">C) {{$topcion3[$valores[0]]}}</span>			
					{{ Form::radio('respuesta_1','C')}} 
			</div>
	
	
		{{-- <div class="form-group">
			
				{!!Form::submit('Registrar Contenido', ['class' => 'btn btn-primary'])!!}
		
	  	</div> --}}
	</div>
  </div>
</div>

<div class="card text-white bg-success mb-3 mt-3">
  <div class="card-header">
	<h3>Pregunta #2</h3>
  </div>
  <div class="card-body">
	<div class="container mb-10">
			{!! Form::label('respuesta_2', $tpreguntas[$valores[1]], ['style' => 'font-size: 20px; text-align: center; color:white; text-transform: uppercase;', 'class' => 'stroke'] )!!}
			<br>
			<div class="radio">
					<span style="font-size: 20px"> A) {{$topcion1[$valores[1]]}}</span>			

  					{{ Form::radio('respuesta_2','A', true)}} 
			
			</div>
			<br>

			<div class="radio">
  					<span style="font-size: 20px"> B) {{$topcion2[$valores[1]]}}</span>			
					{{ Form::radio('respuesta_2','B')}} 
			</div>
			<br>
			<div class="radio">
  					<span style="font-size: 20px"> C) {{$topcion3[$valores[1]]}}</span>			
					{{ Form::radio('respuesta_2','C')}} 
			</div>

	</div>
  </div>
</div>

<div class="card text-white bg-success mb-3 mt-3">
  <div class="card-header" style="">
	<h3>Pregunta #3</h3>
  </div>
  <div class="card-body">
	<div class=" container mb-10" style="">
			{!! Form::label('respuesta_3', $tpreguntas[$valores[2]], ['style' => 'font-size: 20px; text-align: center; color: white;text-transform: uppercase;', 'class' => 'stroke'] )!!}
			<br>
			<div class="radio" style="">
  					<span style="font-size: 20px"> A) {{$topcion1[$valores[2]]}}</span>			
  					{{ Form::radio('respuesta_3','A', true)}} 
			</div>
			<br>
			<div class="radio" style="">
  					<span style="font-size: 20px"> B) {{$topcion2[$valores[2]]}}</span>			
					{{ Form::radio('respuesta_3','B')}} 
  				
			</div>
			<br>
			<div class="radio" style="">
  					<span style="font-size: 20px"> C) {{$topcion3[$valores[2]]}}</span>			
					{{ Form::radio('respuesta_3','C' )}} 
			</div>
	
	
	</div>
  </div>
</div>
</div>

	@php
	$mensaje = "Prueba finalizada. puede ver sus resultados en el modulo de PROGRESO Las respuestas correctas eran:           1) opcion:" .    $tcorrecta[$valores[0]] ."        2)opcion:".$tcorrecta[$valores[1]].  "          3)opcion:".$tcorrecta[$valores[2]];
	@endphp



				{!! Form::text('prueba_id', $pruebas->id , ['style' => 'display:none'])!!}
				{!! Form::text('1', $tcorrecta[$valores[0]] , ['style' => 'display:none'])!!}
				{!! Form::text('2', $tcorrecta[$valores[1]] , ['style' => 'display:none'])!!}
				{!! Form::text('3', $tcorrecta[$valores[2]] , ['style' => 'display:none'])!!}
				{!!Form::submit('Terminar Prueba', ['class' => 'btn btn-primary', 'onclick' => "alert('".$mensaje."')", 'style' => 'margin: auto;'])!!}

	<h3 style="color: #F51616; margin-right: 5px;">Tiempo restante</h3>	
	<div id="cont" style="font-size: 30px; color: #F50E0E">
	</div>

	  	
	</div>
</div>
</div>


	{!!Form::close()!!}

@include('front.template.partes.footer')

@endsection




@section('js')
<script>
var minuto= 3;
var segundo = 0;	
var cont = 0;
var rango = document.getElementById('cont');
    var id = setInterval(function(){
    	if(segundo===0){segundo=59; minuto--;}
        // rango.innerHTML = cont;
        var string = "";
        string = minuto + ':'+ segundo;
        document.getElementById("cont").innerHTML = string; 
        segundo--;
        cont++;
        if(cont == 179) 
        {
            clearInterval(id);
            alert("Se ha acabado tu tiempo, tus respuestas han sido enviadas")
            $("#form1").submit();
        }
    }, 1000); 
</script>
@endsection