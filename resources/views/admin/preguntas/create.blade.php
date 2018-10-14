@extends('admin.template.main')

@section('title','Crear Preguntas')


@section('contenido')

	<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Crear Preguntas</h3>
		</div>
		<div class="card-body">

		{!! Form::open(['route' => 'preguntas.store', 'method' => 'POST', 'class' => 'form-inline']) !!}
		 <div class="container mb-10">
			<div class="form-group mb-2">
			
				{!! Form::label('pregunta', 'Pregunta',['class' => ''])!!}
					
				{!! Form::text('pregunta', null, ['class' => 'form-control ml-3 tamaño', 'placeholder' => 'Escribe la pregunta', 'required', 'style' => 'width:400px;'])!!}

			</div>

			<div class="form-group mb-2">
			
				{!! Form::label('opcion_1', 'A)',['class' => ''])!!}
					
				{!! Form::text('opcion_1', null, ['class' => 'form-control ml-3 tamaño', 'placeholder' => '1ra opcion ', 'required','style' => 'width:400px;'])!!}

			</div>

			<div class="form-group mb-2">
			
				{!! Form::label('opcion_2', 'B)',['class' => ''])!!}
					
				{!! Form::text('opcion_2', null, ['class' => 'form-control ml-3 tamaño', 'placeholder' => '2da Opción', 'required','style' => 'width:400px;'])!!}

			</div>

			<div class="form-group mb-2">
			
				{!! Form::label('opcion_3', 'C)',['class' => ''])!!}
					
				{!! Form::text('opcion_3', null, ['class' => 'form-control ml-3 tamaño', 'placeholder' => '3ra opcion', 'required','style' => 'width:400px;'])!!}

			</div>

			<div class="form-group mb-2">
				{!! Form::label('respuesta', 'Respuesta Correcta')!!}
	
				{!! Form::select('respuesta', ['A' => 'A','B' => 'B','C' => 'C'], null, ['class' => 'form-control ml-3', 'placeholder' => 'Selecciona la respuesta correcta', 'required'])!!}	
			</div>
	
			<div class="form-group mb-2">
			
				{!!Form::submit('Registrar', ['class' => 'btn btn-success mt-4 form-control'])!!}
		
			</div>
		</div>
		{!! Form::close() !!}
	    </div>
	</div>
@endsection