@extends('admin.template.main')


@section('contenido')

@if(Auth::user()->admin())
	<div class="card text-white bg-primary mb-3">
		<div class="card-header">
			@section('title','Crear usuarios')
		</div>
		@if(count($errors) > 0)

		<div class="alert alert-danger" role="alert">
			<ul>

				@foreach($errors->all() as $error)
			    <li>{{$error}}</li>
			    @endforeach
			</ul>

		</div> 
		
	@endif

		
			<div class="card-body">
				
	{!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
		
		<div class="form-group">
			
			{!! Form::label('name', 'Nombre')!!}

			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required'])!!}

		</div>


		<div class="form-group">
			
			{!! Form::label('email', 'Correo Electronico')!!}

			{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo@gmail.com', 'required'])!!}

			
		</div>


		<div class="form-group mb-2">
		{!! Form::label('type', 'Tipo')!!}
	
		{!! Form::select('type', ['joven' => 'Joven', 'admin' => 'Administrador', 'dirigente' => 'Dirigente'], null, ['class' => 'form-control', 'placeholder' => 'Selecciona una opcion', 'required'])!!}	
		</div>

		<div class="form-group">
			
			{!! Form::label('age', 'Edad')!!}

			{!! Form::text('age', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo: 7', 'required'])!!}

		</div>

		<div class="form-group">
			
			{!! Form::label('password', 'Contraseña')!!}

			{!! Form::password('password',['class' => 'form-control', 'placeholder' => '*************', 'required'])!!}
			
		</div>

		<div class="form-group">
			
			{!!Form::submit('Registrar', ['class' => 'btn btn-success'])!!}
		</div>
	{!! Form::close() !!}
			</div>
	</div>
	@else

	<div class="card text-white bg-primary mb-3">
		<div class="card-header">
			@section('title','Crear usuarios')
		</div>
		@if(count($errors) > 0)

		<div class="alert alert-danger" role="alert">
			<ul>

				@foreach($errors->all() as $error)
			    <li>{{$error}}</li>
			    @endforeach
			</ul>

		</div> 
		
	@endif

		
			<div class="card-body">
				
	{!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
		
		<div class="form-group">
			
			{!! Form::label('name', 'Nombre')!!}

			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required'])!!}

		</div>


		<div class="form-group">
			
			{!! Form::label('email', 'Correo Electronico')!!}

			{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo@gmail.com', 'required'])!!}

			
		</div>


		<div class="form-group mb-2">
		{!! Form::label('type', 'Tipo')!!}
	
		{!! Form::select('type', ['joven' => 'Joven'], null, ['class' => 'form-control', 'placeholder' => 'Selecciona una opcion', 'required'])!!}	
		</div>

		<div class="form-group">
			
			{!! Form::label('age', 'Edad')!!}

			{!! Form::text('age', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo: 7', 'required'])!!}

		</div>

		<div class="form-group">
			
			{!! Form::label('password', 'Contraseña')!!}

			{!! Form::password('password',['class' => 'form-control', 'placeholder' => '*************', 'required'])!!}
			
		</div>

		<div class="form-group">
			
			{!!Form::submit('Registrar', ['class' => 'btn btn-success'])!!}
		</div>
	{!! Form::close() !!}
			</div>
	</div>
	@endif

@endsection