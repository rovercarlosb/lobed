@extends('admin.template.main')

@section('title','Lista de Contenidos')

@section('contenido')

	@if(Auth::user()->admin())
	<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Contenido </h3>
		</div>
			<div class="card-body">

				<a href="{{route('contenidos.create')}}" class="btn btn-success">Registrar nuevo Contenido</a><hr>

					{!!Form::open(['route' => 'contenidos.index', 'method' => 'GET', 'class' => 'navbar form form-inline mt-2 mb-2 pull-right'])!!}
	   					<div class="container">
	   						<div class="input-group">
								{!! Form::text('titulo', null, ['class' => 'form-control mr-2', 'placeholder' => 'Buscar contenido', 'aria-descrybedby' => 'search'])!!}
      								<button class="btn btn-outline-success my-2 my-sm-0 espacio" type="submit" id="search">Buscar</button>
    						</div>
    					</div>
   					{!!Form::close()!!}

	<table class="table table-striped">
		<thead class="text-white">
			<th>ID</th>
			<th>Titulo</th>
			<th>Contenido</th>
			<th>Categoria</th>
			<th>Usuario</th>
			<th>Accion</th>
		</thead>		
		<tbody>
			@foreach($contenidos as $contenido)
				<tr data-id="{{$contenido->id}}" class="text-white">
					<td>{{$contenido->id}}</td>
					<td>{{$contenido->titulo}}</td>
					<td>{!!$contenido->contenido!!}</td>
					<td>{{$contenido->categoria->nombre}}</td>
					<td>{{$contenido->user->name}}</td>
					
					<td>
						<a href="#!" class="btn btn-danger" onclick="return confirm('Seguro desea eliminar este contenido?')"><i class="fas fa-user-minus"></i></a> 
						
						<a href="{{ route('contenidos.edit', $contenido->id) }}" class="btn btn-warning"><i class="fas fa-users"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
		<div class="text-center">
		{!!$contenidos->render()!!}
		</div>

	{!! Form::open(['route' => ['admin.contenidos.destroy', ':CONTENIDO_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
	{!! Form::close() !!}
	
	</div>
</div>
@else
	<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Contenido </h3>
		</div>
			<div class="card-body">

				<a href="{{route('contenidos.create')}}" class="btn btn-success">Registrar nuevo Contenido</a><hr>

					{!!Form::open(['route' => 'contenidos.index', 'method' => 'GET', 'class' => 'navbar form form-inline mt-2 mb-2 pull-right'])!!}
	   					<div class="container">
	   						<div class="input-group">
								{!! Form::text('titulo', null, ['class' => 'form-control mr-2', 'placeholder' => 'Buscar contenido', 'aria-descrybedby' => 'search'])!!}
      								<button class="btn btn-outline-success my-2 my-sm-0 espacio" type="submit" id="search">Buscar</button>
    						</div>
    					</div>
   					{!!Form::close()!!}

	<table class="table table-striped">
		<thead class="text-white">
			<th>ID</th>
			<th>Titulo</th>
			<th>Contenido</th>
			<th>Categoria</th>
			<th>Accion</th>
		</thead>		
		<tbody>
			@foreach($contenidos1 as $contenido)
				<tr data-id="{{$contenido->id}}" class="text-white">
					<td>{{$contenido->id}}</td>
					<td>{{$contenido->titulo}}</td>
					<td>{!!$contenido->contenido!!}</td>
					<td>{{$contenido->categoria->nombre}}</td>
					
					<td>
						<a href="#!" class="btn btn-danger" onclick="return confirm('Seguro desea eliminar este contenido?')"><i class="fas fa-user-minus"></i></a> 
						
						<a href="{{ route('contenidos.edit', $contenido->id) }}" class="btn btn-warning"><i class="fas fa-users"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
		<div class="text-center">
		{!!$contenidos->render()!!}
		</div>

	{!! Form::open(['route' => ['admin.contenidos.destroy', ':CONTENIDO_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
	{!! Form::close() !!}
	
	</div>
</div>
@endif

@endsection
@section('js')
<script>
	
	$(document).ready(function(){

		$('.btn-danger').click(function(e){

			e.preventDefault();

			var row= $(this).parents('tr');
			var id = row.data('id');
			var form = $('#form-delete');
			var url = form.attr('action').replace(':CONTENIDO_ID', id);
			var data = form.serialize();
	
			row.fadeOut();

			$.post(url, data, function(result){

				alert('el usuario fue eliminado correctamente');

			}).fail(function(){

				alert('El usuario no fue eliminado');
				row.show();
			});
		});
	});
</script>
@endsection