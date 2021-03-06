@extends('admin.template.main')

@section('title','Crear nueva Prueba Didactica ')

@section('contenido')

	<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Crear Prueba Didactica</h3>
		</div>
		<div class="card-body">

		{!! Form::open(['route' => 'pruebasD.store', 'method' => 'POST', 'files' => true, 'class' => 'form-inline']) !!}
		 <div class="container mb-10">
			<div class="form-group mb-2">
			
				{!! Form::label('nombre', 'Nombre de la prueba',['class' => ''])!!}
					
				{!! Form::text('nombre', null, ['class' => 'form-control ml-3 tamaño', 'placeholder' => 'Escribe el nombre', 'required', 'style' => 'width:400px;'])!!}

			</div>

			<div class="form-group mb-2">
			{!! Form::label('preguntas', 'Preguntas',['class' => 'mr-3']) !!}
			{!! Form::select('preguntas[]', $preguntas, null, ['class' => 'form-control ml-2 select-pregunta', 'multiple', 'required','style' => 'width:400px;']) !!}

			</div>
			
			<div class="form-group mb-2">
			{!! Form::label('status', 'Status',['class' => 'mr-3']) !!}
			
				<div class="radio ml-3">
  					Encendido
  					{{ Form::radio('status','encendido')}} 
				</div>

				<div class="radio ml-3">
					Apagado
					{{ Form::radio('status','apagado')}} 
				</div>
				
				</div>
			
			<div class="form-group mb-2">
				{!! Form::label('image', 'Imagen  (Seleccione 3)', ['class' => 'mr-3'])!!}
	
				{!! Form::file('image[]',['multiple'])!!}	
			</div>

			<div class="form-group mb-2">
			{!! Form::label('type', 'Tipo')!!}
	
			{!! Form::select('type', ['simple' => 'Simple', 'didactica' => 'Didactica'], null, ['class' => 'form-control', 'placeholder' => 'Selecciona una opcion', 'required'])!!}	
		</div>
			<br>

		
			</div>
							{!!Form::submit('Registrar', ['class' => 'btn btn-success mt-4 form-control'])!!}

		</div>
		{!! Form::close() !!}
	    </div>
	</div>
@endsection
@section('js')

<script>

$('.select-pregunta').chosen({
		placeholder_text_multiple: 'Seleccione 3 preguntas',
		max_selected_options: 3,
		search_contains: true,
		no_results_text: 'No se encontraron estas preguntas'
	});

$(".select-pregunta").bind("chosen:maxselected", function () {
    alert("Numero maximo de preguntas permitidas")
});
</script>
@endsection