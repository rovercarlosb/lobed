@extends('admin.template.main')

@section('title','Lista de imagenes')

@section('contenido')

	<div class="row">
		
		@foreach($imagenes as $imagen)

			<div class="col-md-4">
				<div class="panel panel-default">
					
					<div class="panel-body">
						
						<img src="{{asset('imagenes/articulos/'.$imagen->nombre) }}" alt="" class="img-responsive" height="300px" width="300px">

					</div>

					<div class="panel-footer">
						{{$imagen->articulo->nombre_articulo}}

					</div>	

				</div>

			</div>

		@endforeach
	</div>


@endsection