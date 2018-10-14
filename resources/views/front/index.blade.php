@extends('front.template.main')

@section('title', 'Inicio')

@section('head', 'Es hora de aprender!!!')

@section('contenido')

 @include('front.template.partes.moduls')

  @include('front.template.partes.about')

  @include('front.template.partes.video')


	
	<div class="blog-area">
	<header id="principal" style="width: 300px;

			/*background-color: #ABEF28;*/
			text-align: center;
			margin: 15px auto;
			padding: 15px;
			border: 3px solid #37920B;
			border-radius: 15px;
			box-shadow: #999 5px 5px 5px;
			background: -webkit-linear-gradient(right, #160BA2 ,#42BAE7 ); /*Esta propiedad es para dar degragado lineal  el webkit es por que es para chrome */
			background: -moz-linear-gradient(bottom, #160BA2,#248AE1);

			background: -webkit-radial-gradient(center,ellipse, #160BA2 ,#42BAE7 ); /*Esta propiedad es para dar degragado circular en forma de elipse*/

			/*-webkit-transform: scale(0.5); esto cambia el tamaÃ±o de lo que etsemos modificando en el selector entre 0 y 1 , mas de uno sera el doble del tamaÃ±o */

			-webkit-transition: -webkit-transform 0.4s ease 0.5s;">
		<span id="titulo" style=" 
			text-shadow: #F9870E 3px 3px 5px;
			color: #FFFFFF; font-size: 40px;">Contenidos
		</span>
		</header>
						<br>

				<div class="container">
					<div class="row">

				@foreach($contenidos as $contenido)

					<div class="card" style="width: 18rem; margin-left: 25px; border: 2px solid #20329F; box-shadow: #4ECF4B 5px 5px 5px;">
						@foreach($contenido->imagenes as $imagen)

						<a href="{{ route('front.view.contenido', $contenido->titulo) }}"><div class="thumb" ><img class="card-img-top" src="{{asset('imagenes/articulos/'.$imagen->nombre)}}" height="215px" width="290px" alt="Card image cap"></div></a>
						@break(1)
						@endforeach
  							<div class="card-body">
								<div class="desc text-center">
									<h3>{{$contenido->titulo}}</h3>
									<hr style="border: 2px solid #31AB15;">
								</div>
								<div class="pull-right mt-2">
									<strong>Subido:</strong>
									<span class="badge badge-pill" style="background-color: #2F8FFA; font-size: 12px" ><i class="far fa-clock"></i> {{$contenido->created_at->diffForHumans() }}</span>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
		{!! $contenidos->render() !!}
			</div>
						<hr style="border: 2px solid #0544C5;">
			</div>

{{--   @include('front.template.partes.articulos')
 --}}
  @include('front.template.partes.footer')
	
@endsection 

