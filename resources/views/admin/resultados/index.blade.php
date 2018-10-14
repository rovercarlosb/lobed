 @extends('admin.template.main')

@section('title','Lista de Resultados')

@section('contenido')

	<div class="card text-white bg-primary mb-3 mt-3">
		<div class="card-header">
			<h3>Resultados </h3>
		</div>
			<div class="card-body">
				<a href="{{ route('resultados.pdf') }}" class="btn btn-sm btn-success" style="margin-bottom: 8spx">
          		  Descargar resultados en PDF
      			</a>
	<table class="table table-striped">
		<thead class="text-white">
			<th>ID</th>
			<th>Usuario</th>
			<th>Prueba</th>
			<th>Calificación</th>
			<th>Accion</th>
		</thead>		
		<tbody>
			@foreach($resultados as $resultado)
				<tr data-id="{{$resultado->id}}" class="text-white">
					<td>{{$resultado->id}}</td>
					<td>{{$resultado->user->name}}</td>
					<td>{{$resultado->prueba->nombre}}</td>
					<td>{{$resultado->calificacion}}</td>
					<td>
						<a href="#!" class="btn btn-danger" onclick="return confirm('Seguro desea eliminar este resultado?')"><i class="fas fa-user-minus"></i></a> 						
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
		<div class="text-center">
		{!!$resultados->render()!!}
		</div>

	{!! Form::open(['route' => ['admin.resultados.destroy', ':RESULTADO_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
	{!! Form::close() !!}
	
	</div>
</div>

<div class="row justify-content-around">
    <div class="col-12">
<div class="card text-white mb-3 mt-3" style="background-color: #0F8ED0; width: 380px;">
		<div class="card-header">
			<h3 style="color: white; text-align: center;">Calificación por resultados</h3>
		</div>
			<div class="card-body">
	<table class="table table-striped">
		<thead class="text-white">
			<th>Preguntas Correctas</th>
			<th>Calificacion</th>
			<th></th>
		</thead>		
		<tbody>
				<tr>
					<td>3 Correctas</td>
					<td>Excelente</td>
					<td><i class="fas fa-star fa-3x" style="color: #EDBB0D;"></i></td>
				</tr>
				<tr>
					<td>2 Correctas</td>
					<td>Muy bien, puedes hacerlo mejor</td>
					<td><i class="fas fa-check-circle fa-3x" style="color:#0C7409"></i></td>
				</tr>
				<tr>
					<td>1 Correcta</td>
					<td>Regular</td>
					<td><i class="fab fa-angellist fa-3x" style="color: #E86F0E;"></i></td>
				</tr>
				<tr>
					<td>Ninguna Correcta</td>
					<td>Deficiente</td>
					<td><i class="fas fa-times-circle fa-3x" style="color: #F3050B"></i></td>
				</tr>
		</tbody>
	</table>
</div>
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
			var url = form.attr('action').replace(':RESULTADO_ID', id);
			var data = form.serialize();
	
			row.fadeOut();

			$.post(url, data, function(result){

				alert('El resultado fue eliminado corectamente');

			}).fail(function(){

				alert('El resultado no fue eliminado');
				row.show();
			});
		});
	});
</script>
@endsection