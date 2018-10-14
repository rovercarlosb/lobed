@extends('admin.template.main')

@section('title','Categorias')

@section('contenido')

<style type="text/css">
	.borde{
		text-align: center;
		margin: auto;
		color: #191DBE;
	}
	
</style>
	
	<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Categorias</h3>
		</div>
		<div class="card-body">
			<a href="{{ route('categorias.create')}}" class="btn btn-success"> Registrar nueva categoria</a>
	
			{!!Form::open(['route' => 'categorias.index', 'method' => 'GET', 'class' => 'navbar form form-inline mt-2 mb-2 pull-right'])!!}
	   		<div class="container" style="margin-left: 700px;">
	   		<div class="input-group">
				{!! Form::text('nombre', null, ['class' => 'form-control mr-2', 'placeholder' => 'Buscar categoria', 'aria-descrybedby' => 'search'])!!}
      			<button class="btn btn-outline-success my-2 my-sm-0 espacio" type="submit" id="search">Buscar</button>
    		</div>
    		</div>
   			{!!Form::close()!!}


	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($categorias as $categoria)
			<tr>
				<td>{{ $categoria->id}}</td>
				<td>{{ $categoria->nombre}}</td>
				<td>
					<a href="{{ route('admin.categorias.destroy',$categoria->id)}}" class="btn btn-danger" onclick="return confirm('Seguro desea eliminar esta categoria?')"><i class="fas fa-user-minus"></i></a> 
						
						<a href="{{ route('categorias.edit',$categoria->id)}}" class="btn btn-warning"><i class="fas fa-users"></i></a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table> 
<div class="container">
	<div class="row">
		<div class="borde p-3 mb-2 text-white">{!!$categorias->render()!!}</div>
	</div>
</div>
</div>
</div>
@endsection