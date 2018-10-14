@extends('front.template.main')

@section('title', $contenido->titulo)

@section('head', 'Contenido')
	 
@section('contenido')

	@php 
		$timagenes = array();
		$i=0;
	@endphp
	@foreach($my_imagenes as $id => $imagen)
		
		@php 
		$timagenes[] = $id;
		$i++;
		@endphp

	@endforeach

<div class="white-bg">
	<div class="container">
		<h1 class="stroke" style="text-align: center; text-decoration-line: underline; text-transform:uppercase; font-style: italic; margin-bottom: 30px; font-size: 70px ">{{$contenido->titulo}}</h1>

							<div class="col-md-12">
								<p style="font-size: 30px; color: #090909;">{!!$contenido->contenido!!}.</p>
							</div>
							
						<center>
							<div class="col-md-12">
								
								<ul class="pgwSlideshow" style="margin-bottom: 20px;" maxHeight="350px">
								<li>
									<figure>
								<img src="{{asset('imagenes/articulos/'.$timagenes[0])}}" alt="{{$contenido->titulo}}" class="img-fluid"height="220px" width="260px"
								  >
								  	</figure>
								  </li>

								<li><figure>	
								<img src="{{asset('imagenes/articulos/'.$timagenes[1])}}"height="220px" width="260px" alt="{!!$contenido->titulo!!}" class="rounded " style="padding: 4px;
  								  background: #A09D9D;
								  border-radius: 20px;
								  -webkit-transition: -webkit-transform 0.3s ease-in-out 0.1s;
								  box-shadow: #9815F4 5px 5px 10px;">
							</figure></li>

								<li><figure style="margin-top:">	
								<img src="{{asset('imagenes/articulos/'.$timagenes[2])}}" height="220px" width="260px"alt="{!!$contenido->titulo!!}" class="" style="padding: 4px;
  								  background: #A09D9D;
								  border-radius: 20px;
								  -webkit-transition: -webkit-transform 0.3s ease-in-out 0.1s;
								   ">
							</figure></li>

								  </ul>	
								</center>
							</div>


						
		</div>


</div>
</div>
  @include('front.template.partes.footer')


@endsection

