@extends('admin.template.main')

@section('title','Editar usuario '.$user->name)

@section('contenido')

@if(Auth::user()->admin())
<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Editar usuario {!!$user->name!!}</h3>
		</div>
		<div class="card-body">
	{!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
		
		<div class="form-group">
			
			{!! Form::label('name', 'Nombre')!!}

			{!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required'])!!}

		</div>


		<div class="form-group">
			
			{!! Form::label('email', 'Correo Electronico')!!}

			{!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Ejemplo@gmail.com', 'required'])!!}

			
		</div>

		<div class="form-group mb-2">
		{!! Form::label('type', 'Tipo')!!}
	
		{!! Form::select('type', ['joven' => 'Joven', 'admin' => 'Administrador', 'dirigente' => 'Dirigente'], $user->type, ['class' => 'form-control', 'placeholder' => 'Selecciona una opcion', 'required'])!!}	
		</div>

		<div class="form-group">
			
			{!! Form::label('age', 'Edad')!!}

			{!! Form::text('age', $user->age, ['class' => 'form-control', 'placeholder' => 'Ejemplo: 7', 'required'])!!}

		</div>



		<div class="form-group">
			
			{!!Form::submit('Actualizar', ['class' => 'btn btn-primary'])!!}
		</div>
	{!! Form::close() !!}
</div>
</div>
@else

<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Editar usuario {!!$user->name!!}</h3>
		</div>
		<div class="card-body">
	{!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
		
		<div class="form-group">
			
			{!! Form::label('name', 'Nombre')!!}

			{!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required'])!!}

		</div>


		<div class="form-group">
			
			{!! Form::label('email', 'Correo Electronico')!!}

			{!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Ejemplo@gmail.com', 'required'])!!}

			
		</div>

		<div class="form-group mb-2">
		{!! Form::label('type', 'Tipo')!!}
	
		{!! Form::select('type', ['joven' => 'Joven'], $user->type, ['class' => 'form-control', 'placeholder' => 'Selecciona una opcion', 'required'])!!}	
		</div>

		<div class="form-group">
			
			{!! Form::label('age', 'Edad')!!}

			{!! Form::text('age', $user->age, ['class' => 'form-control', 'placeholder' => 'Ejemplo: 7', 'required'])!!}

		</div>



		<div class="form-group">
			
			{!!Form::submit('Actualizar', ['class' => 'btn btn-primary'])!!}
		</div>
	{!! Form::close() !!}
</div>
</div>
@endif

@endsection