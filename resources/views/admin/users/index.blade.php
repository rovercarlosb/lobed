@extends('admin.template.main')

@section('title','Lista de usuarios')

@section('contenido')

<style type="text/css">
	
	.pag{

		margin-left: 2px;
		border: 1px solid #343333;
		width: 100px;

	}
</style>
	@if(Auth::user()->admin())
	<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Usuarios</h3>
		</div>
		<div class="card-body">	
	<a href="{{route('users.create')}}" class="btn btn-success">Registrar nuevo usuario</a><hr>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Correo</th>
			<th>Accion</th>
		</thead>		
		<tbody>
			@foreach($users as $user)
				<tr data-id="{{$user->id}}">
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					@if($user->type==='joven')
					<td><span class="badge badge-success">{{$user->type}}</span></td>
					@elseif($user->type==='dirigente')
					<td><span class="badge badge-warning">{{$user->type}}</span></td>
					@else
					<td><span class="badge badge-danger">{{$user->type}}</span></td>
					@endif
					<td>{{$user->email}}</td>
					
					<td>
						<a href="#!" class="btn btn-danger" onclick="return confirm('Seguro desea eliminar este usuario?')"><i class="fas fa-user-minus"></i></a> 
						
						<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="fas fa-users"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class=" pagination borde p-3 mb-2 bg-warning text-black pag" style="margin-left: 450px">
	{!!$users->render()!!}
	</div>
</div>
</div>
@else

<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Usuarios</h3>
		</div>
		<div class="card-body">	
	<a href="{{route('users.create')}}" class="btn btn-success">Registrar nuevo usuario</a><hr>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Correo</th>
			<th>Accion</th>
		</thead>		
		<tbody>
			@foreach($users1 as $user)
				<tr data-id="{{$user->id}}">
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					@if($user->type==='joven')
					<td><span class="badge badge-success">{{$user->type}}</span></td>
					@elseif($user->type==='dirigente')
					<td><span class="badge badge-warning">{{$user->type}}</span></td>
					@else
					<td><span class="badge badge-danger">{{$user->type}}</span></td>
					@endif
					<td>{{$user->email}}</td>
					
					<td>
						<a href="#!" class="btn btn-danger" onclick="return confirm('Seguro desea eliminar este usuario?')"><i class="fas fa-user-minus"></i></a> 
						
						<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="fas fa-users"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class=" pagination borde p-3 mb-2 bg-warning text-black pag" style="margin-left: 450px">
	{!!$users->render()!!}
	</div>
</div>
</div>
@endif
		{!! Form::open(['route' => ['admin.users.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
		{!! Form::close() !!}
	
@endsection
@section('js')
<script>
	
	$(document).ready(function(){

		$('.btn-danger').click(function(e){

			e.preventDefault();

			var row= $(this).parents('tr');
			var id = row.data('id');
			var form = $('#form-delete');
			var url = form.attr('action').replace(':USER_ID', id);
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