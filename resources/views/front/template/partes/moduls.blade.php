<!-- Start Feature Area -->
<audio preload="auto" id="sonido2">
	<source src="{{asset('assets/musica/mario-coin.mp3')}}" type="audio/mp3"/>
</audio>

<audio preload="auto" id="sonido1">
	<source src="{{asset('assets/musica/cartoon008.wav')}}" type="audio/wav"/>
</audio>

<audio preload="auto" id="sonido3">
	<source src="{{asset('assets/musica/candy.mp3')}}" type="audio/mp3"/>
</audio>

<audio preload="auto" id="sonido4">
	<source src="{{asset('assets/musica/ganar.mp3')}}" type="audio/mp3"/>
</audio>


<embed src="{{asset('assets/musica/intro.mp3')}}" autostart="true" loop="infinite" volume="80" width="0" height="0">


			<section class="featured-area">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="single-feature d-flex flex-wrap justify-content-between">
								<div class="icon" onmouseenter ="rep('sonido3');">
									<a href="{{route('front.contenidos.index')}}"><figure><i class="fas fa-book fa-5x" style="color: #1E2CB5;"></i></figure></a>
								</div>
								<div class="desc">
									<a href="{{route('front.contenidos.index')}}"><h4>Contenidos</h4></a>
									<p>En esta seccion podras observar todo el contenido e imagenes referente a nuestra manada.</p>
								</div>
							</div>
						</div>
						@if(Auth::user()->age >= 9 or Auth::user()->admin() or Auth::user()->dirigente())
						<div class="col-md-6">
							<div class="single-feature d-flex flex-wrap justify-content-between">
								<div class="icon" onmouseenter ="rep('sonido2');">
									<a href="{{route('front.pruebas.index')}}"><figure><i class="fas fa-edit fa-5x" style="color: #1E2CB5;"></i></figure></a>
								</div>
								<div class="desc">
									<a href="{{route('front.pruebas.index')}}"><h4>Pruebas Selección</h4></a>
									<p>En esta sección podras realizar las pruebas asignadas por tu dirigente.</p>
								</div>
							</div>
						</div>
						@endif
						<div class="col-md-6" style="margin: auto;">
							<div class="single-feature d-flex flex-wrap justify-content-between">
								<div class="icon" onmouseenter ="rep('sonido4');">
									<a href="{{route('front.resultados.index')}}"><figure><i class="fas fa-star fa-5x" style="color: #1E2CB5;"></i></figure></a>
								</div>
								<div class="desc">
									<a href="{{route('front.resultados.index')}}"><h4>Progreso</h4></a>
									<p>Ve aqui tu progreso como Lobato Scout.</p>
								</div>
							</div>
						</div>
						<div class="col-md-6" style="margin: auto;">
							<div class="single-feature d-flex flex-wrap justify-content-between">
								<div class="icon" onmouseenter ="rep('sonido1');">
									<a href="{{route('front.pruebasD.index')}}"><figure><i class="fas fa-chalkboard fa-5x" style="color: #1E2CB5;"></i></figure></a>
								</div>
								<div class="desc">
									<a href="{{route('front.pruebasD.index')}}"><h4>Pruebas Didacticas</h4></a>
									<p>Pruebas con muchas imagenes, presta mucha atención</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<hr style="border: 2px solid #1CA419;">
			<!-- End Feature Area -->
