@extends('admin.template.main')

@section('title','Editar Categoria '.$categoria->nombre)

@section('contenido')

	<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3> Editar Categoria</h3>
		</div> 
		<div class="card-body">
	{!! Form::open(['route' => ['categorias.update', $categoria], 'method' => 'PUT']) !!}
		
		<div class="form-group">
			
			{!! Form::label('name', 'Nombre')!!}

			{!! Form::text('nombre', $categoria->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required'])!!}

		</div>

		<div class="form-group">
			
			{!!Form::submit('Actualizar', ['class' => 'btn btn-success'])!!}
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection