@extends('admin.template.main')

@section('title','Lista de Pruebas')

@section('contenido')

@if(Auth::user()->admin())
	<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Pruebas</h3>
		</div>
			<div class="card-body">

				<a href="{{route('pruebas.create')}}" class="btn btn-success">Registrar nueva prueba</a><hr>

	<table class="table table-striped">
		<thead class="text-white">
			<th>ID</th>
			<th>Prueba</th>
			<th>Usuario Creador</th>
			<th>Status</th>
			<th>Accion</th>
		</thead>		
		<tbody>
			@foreach($pruebas as $prueba)
				<tr data-id="{{$prueba->id}}" class="text-white">
					<td>{{$prueba->id}}</td>
					<td>{{$prueba->nombre}}</td>
					<td>{{$prueba->user->name}}</td>
					<td>{{$prueba->status}}</td>
					<td>
						<a href="#!" class="btn btn-danger" onclick="return confirm('Seguro desea eliminar esta prueba?')"><i class="fas fa-user-minus"></i></a> 
						
						<a href="{{ route('pruebas.edit', $prueba->id) }}" class="btn btn-warning"><i class="fas fa-users"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
		<div class="text-center">
		{!!$pruebas->render()!!}
		</div>

	{!! Form::open(['route' => ['pruebas.destroy', ':PRUEBA_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
	{!! Form::close() !!}
	
	</div>
</div>
@else 
		<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Pruebas</h3>
		</div>
			<div class="card-body">

				<a href="{{route('pruebas.create')}}" class="btn btn-success">Registrar nueva prueba</a><hr>

	<table class="table table-striped">
		<thead class="text-white">
			<th>ID</th>
			<th>Prueba</th>
			<th>Status</th>
			<th>Accion</th>
		</thead>		
		<tbody>
			@foreach($pruebas1 as $prueba)
				<tr data-id="{{$prueba->id}}" class="text-white">
					<td>{{$prueba->id}}</td>
					<td>{{$prueba->nombre}}</td>
					<td>{{$prueba->status}}</td>
					<td>
						<a href="#!" class="btn btn-danger" onclick="return confirm('Seguro desea eliminar esta prueba?')"><i class="fas fa-user-minus"></i></a> 
						
						<a href="{{ route('pruebas.edit', $prueba->id) }}" class="btn btn-warning"><i class="fas fa-users"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
		<div class="text-center">
		{!!$pruebas->render()!!}
		</div>

	{!! Form::open(['route' => ['pruebas.destroy', ':PRUEBA_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
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
			var url = form.attr('action').replace(':PRUEBA_ID', id);
			var data = form.serialize();
	
			row.fadeOut();

			$.post(url, data, function(result){

				alert('La prueba fue eliminada correctamente');

			}).fail(function(){

				alert('La prueba no fue eliminada');
				row.show();
			});
		});
	});
</script>
@endsection