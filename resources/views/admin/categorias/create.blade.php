@extends('admin.template.main')

@section('title','Crear Categorias')

@section('contenido')
	
	<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Categorias</h3>
		</div>
		<div class="card-body">

		{!! Form::open(['route' => 'categorias.store', 'method' => 'POST', 'class' => 'form-inline']) !!}
		 <div class="container mb-10">
			<div class="form-group">
			
				{!! Form::label('name', 'Nombre',['class' => ''])!!}
					
				{!! Form::text('nombre', null, ['class' => 'form-control ml-2', 'placeholder' => 'Nombre categoria', 'required'])!!}

			</div>
	
			<div class="form-group">
			
				{!!Form::submit('Registrar', ['class' => 'btn btn-success mt-4'])!!}
		
			</div>
		</div>
		{!! Form::close() !!}
	    </div>
	</div>
@endsection