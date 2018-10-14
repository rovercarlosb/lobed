@extends('admin.template.main')

@section('title','Editar Prueba '. $prueba->nombre)

@section('contenido')


	<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Editar Pruebas</h3>
		</div>
		<div class="card-body">

		{!!Form::open(['route' => ['pruebas.update', $prueba], 'method' => 'PUT','class' => 'form-inline'])!!}
		<div class="container mb-10">
			<div class="form-group mb-2">
			
				{!! Form::label('nombre', 'Nombre de la prueba',['class' => ''])!!}
					
				{!! Form::text('nombre', $prueba->nombre, ['class' => 'form-control ml-3 tamaño', 'placeholder' => 'Escribe el nombre', 'required', 'style' => 'width:400px;'])!!}

			</div>

			<div class="form-group mb-2">
			{!! Form::label('preguntas', 'Preguntas',['class' => 'mr-3']) !!}
			{!! Form::select('preguntas[]', $preguntas, $my_preguntas, ['class' => 'form-control ml-2 select-pregunta', 'multiple', 'required','style' => 'width:400px;']) !!}

			</div>
			
			@if($prueba->status == "encendido")
			<div class="form-group mb-2">
			{!! Form::label('status', 'Status',['class' => 'mr-3']) !!}
			
				<div class="radio ml-3">
  					Encendido
  					{{ Form::radio('status','encendido' ,true)}} 
				</div>

				<div class="radio ml-3">
					Apagado
					{{ Form::radio('status','apagado')}} 
				</div>
				
				</div>
			@else

			<div class="form-group mb-2">
			{!! Form::label('status', 'Status',['class' => 'mr-3']) !!}
			
				<div class="radio ml-3">
  					Encendido
  					{{ Form::radio('status','encendido')}} 
				</div>

				<div class="radio ml-3">
					Apagado
					{{ Form::radio('status','apagado',true)}} 
				</div>
				
				</div>
			@endif
			
			<div class="form-group mb-2">
						
			
				{!!Form::submit('Actualizar', ['class' => 'btn btn-success mt-4 form-control'])!!}
		
			</div>
		</div>	
	{!!Form::close()!!}
@endsection
@section('js')

<script>
	$('.select-pregunta').chosen({
		placeholder_text_multiple: 'Seleccione un maximo de 7',
		max_selected_options: 7,
		search_contains: true,
		no_results_text: 'No se encontraron estos tags'
	});
</script>

@endsection
