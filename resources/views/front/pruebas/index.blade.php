@extends('front.template.main')

@section('title', 'Pruebas')

@section('head', 'Pruebas')
	 
@section('contenido')

	{{-- @php 
		$tid = array();
		$i=0;
		@endphp
		@foreach($res as $id => $respuesta)
	
			@php 
			$tid[] = $id;last
			$i++;
		
			@endphp

		@endforeach --}}


@php
$new = 5;

// if ($new = array_search($last1, $tid, true) != false) {
// 	dd($new);
// 	$new = 0;
	
// } else{
// 	$new = 5;
// }

@endphp

@if(count($pruebas)>0 && $res != $last1)
<div class="blog-area">
	
				<div class="container">
					<div class="row">
						@foreach($pruebas as $prueba)
							<div class="card" style="width: 18rem; margin-left: 10px; background-color: #5FCC4D ;padding: 4px;
								  border-radius: 20px;
								  -webkit-transition: -webkit-transform 0.3s ease-in-out 0.1s;
								  box-shadow: #C3C2C2 5px 5px 10px;">
  								<div class="card-body">
    								<h4 class="card-title">{{$prueba->nombre}}</h4>
    								<hr style="width: 14rem; border: 1px solid black;">
    								<h6 class="card-subtitle mb-2" style="color:#92147F;">Creada por el Scouter: <br><span style="color: white;">{{$prueba->user->name}}</span></h6>
    								<p class="card-text" style="color: black; margin-bottom: 10px;">Una nueva prueba ha sido creada, pon a prueba tus capacidades.</p>
    								<a href="{{ route('front.view.resultados.create', $prueba->id) }}" class="card-link" style="color: #FCFAFD; background-color: #3064BB; border-radius: 4px; -moz-border-radius: 5px;
								  		-webkit-transition: -webkit-transform 0.3s ease-in-out 0.1s;
								  		box-shadow: #952ACD 2px 2px 10px;"><strong>Empezar</strong></a>  				
									<div class="pull-right mt-2">
										<span class="badge badge-pill" style="background-color: #3064BB; font-size: 12px; box-shadow: #952ACD 2px 2px 10px;" ><i class="far fa-clock"></i> {{$prueba->created_at->diffForHumans() }}</span>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
{{-- 		{!! $pruebas->render() !!}
 --}}</div>
</div>

 {{-- @include('front.template.partes.grupo') --}}

 @include('front.template.partes.footer')

@else

<div class="blog-area">
				<div class="container">
					<div class="row">
							<div class="card" style="width: 18rem; margin-left: 10px; background-color: #A29E9E; margin: auto;padding: 4px;
  								  background: #A09D9D;
								  border-radius: 20px;
								  -webkit-transition: -webkit-transform 0.3s ease-in-out 0.1s;
								  box-shadow: #C3C2C2 5px 5px 10px;
								  -webkit-transform:scale(1.2);
								  ">
  								<div class="card-body">
    								<h4 class="card-title">No hay pruebas disponibles</h4>
    								<hr style="width: 14rem; border: 1px solid black;">
    								<p class="card-text" style="color: black">Espera a que el dirigente cree una nueva prueba para ti.</p>	
								</div>
							</div>
					</div>
				</div>
</div>
</div>

{{-- @include('front.template.partes.grupo') --}}

 @include('front.template.partes.footer')
@endif
@endsection
@section('js')
<script>
	javascript:window.history.forward(1);
</script>

