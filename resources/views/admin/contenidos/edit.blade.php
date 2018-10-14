@extends('admin.template.main')

@section('title','Editar Contenido '. $contenido->titulo)

@section('contenido')


<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3> EditarContenido </h3>
		</div>
			<div class="card-body">

	{!!Form::open(['route' => ['contenidos.update', $contenido], 'method' => 'PUT','class' => 'form-inline'])!!}

	<div class="container mb-10">
		<div class="form-group mb-2">
			{!! Form::label('titulo', 'Titulo del Contenido')!!}
	
			{!! Form::text('titulo', $contenido->titulo, ['class' => 'form-control ml-3', 'placeholder' => 'Titulo del contenido', 'required'])!!}	
		</div>
		
		<div class="form-group mb-2">
			{!! Form::label('contenido', 'Contenido')!!}
	
			{!! Form::textarea('contenido', $contenido->contenido, ['class' => 'form-control trumbowyg-demo'])!!}	
		</div>


	<div class="form-group mb-2">
		{!! Form::label('categoria_id', 'Categoria')!!}
	
		{!! Form::select('categoria_id', $categorias, $contenido->categoria->id, ['class' => 'form-control', 'placeholder' => 'Selecciona una opcion', 'required'])!!}	
	</div>
	

	<div class="form-group">
			
				{!!Form::submit('Actualizar ', ['class' => 'btn btn-success'])!!}
		
	</div>
</div>
</div>
	{!!Form::close()!!}
</div>
@endsection
	
@section('js')
	<script>
		
			$('.trumbowyg-demo').trumbowyg();


	</script>

@endsection
