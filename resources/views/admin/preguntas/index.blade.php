@extends('admin.template.main')

@section('title','Lista de Preguntas')

@section('contenido')

	<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Preguntas </h3>
		</div>
			<div class="card-body">

				<a href="{{route('preguntas.create')}}" class="btn btn-success">Registrar nueva pregunta</a><hr>
			{!!Form::open(['route' => 'preguntas.index', 'method' => 'GET', 'class' => 'navbar form form-inline mt-2 mb-2 pull-right'])!!}
	   					<div class="container">
	   						<div class="input-group">
								{!! Form::text('pregunta', null, ['class' => 'form-control mr-2', 'placeholder' => 'Buscar pregunta', 'aria-descrybedby' => 'search'])!!}
      								<button class="btn btn-outline-success my-2 my-sm-0 espacio" type="submit" id="search">Buscar</button>
    						</div>
    					</div>
   			{!!Form::close()!!}

	<table class="table table-striped">
		<thead class="text-white">
			<th>ID</th>
			<th>Pregunta</th>
			<th>Respuesta Correcta</th>
			<th>Accion</th>
		</thead>		
		<tbody>
			@foreach($preguntas as $pregunta)
				<tr data-id="{{$pregunta->id}}" class="text-white">
					<td>{{$pregunta->id}}</td>
					<td>{{$pregunta->pregunta}}</td>
					<td>{{$pregunta->respuesta}}</td>
					<td>
						<a href="#!" class="btn btn-danger" onclick="return confirm('Seguro desea eliminar esta pregunta?')"><i class="fas fa-user-minus"></i></a> 
						
						<a href="{{ route('preguntas.edit', $pregunta->id) }}" class="btn btn-warning"><i class="fas fa-users"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
		<div class="text-center">
		{!!$preguntas->render()!!}
		</div>

	{!! Form::open(['route' => ['admin.preguntas.destroy', ':PREGUNTA_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
	{!! Form::close() !!}
	
	</div>
</div>
@endsection
@section('js')
<script>
	
	$(document).ready(function(){

		$('.btn-danger').click(function(e){

			e.preventDefault();

			var row= $(this).parents('tr');
			var id = row.data('id');
			var form = $('#form-delete');
			var url = form.attr('action').replace(':PREGUNTA_ID', id);
			var data = form.serialize();
	
			row.fadeOut();

			$.post(url, data, function(result){

				alert('La pregunta fue eliminada corectamente');

			}).fail(function(){

				alert('La pregunta no fue eliminada');
				row.show();
			});
		});
	});
</script>
@endsection