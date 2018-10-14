<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Default') | Panel de administracion</title>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/Trumbowyg-master/dist/ui/trumbowyg.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/chosen/chosen.css')}}">
	<style type="text/css">
			
		.card-deck .card a{
		color: white;
		transition: color .5s;
		}
		
		
		 .card-deck .card {
		background-color: #07359C;
		
			
		}		

			
		.card-deck .card a:hover {
			color: #F96718;
			text-decoration: none;
			-webkit-transform:scale(1.2);
		}

		.card-text {
		color: white;
		width: 11em;
		float: right;
		font-family: cursive;
		}
		figure{
			-webkit-transition: -webkit-transform 0.3s ease-in-out 0.1s; 
		}
		
		figure:hover{
			-webkit-transform:scale(1.1);
		}
		
		body {

/* Ubicación de la imagen */

background-image: url({{asset('assets/imagenes/fondo3.jpg')}});

/* Para dejar la imagen de fondo centrada, vertical y

horizontalmente */

background-position: center center;

/* Para que la imagen de fondo no se repita */

background-repeat: no-repeat;

/* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */

background-attachment: fixed;

/* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */

background-size: cover;

/* Se muestra un color de fondo mientras se está cargando la imagen

de fondo o si hay problemas para cargarla */

background-color: #66999;

}

	</style>

</head>
<body>
		

	@include('admin.template.partes.nav')

	@include('flash::message')
	@include('admin.template.partes.errors')


	<div class="container w-300">
		
			
			@yield('contenido')
			
	</div>
	
	
	<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.js')}}"></script>	
	<script src="{{asset('assets/chosen/chosen.jquery.js')}}"></script>				
	<script src="{{asset('assets/fontawesome-all.js')}}"></script>			
	<script src="{{asset('assets/Trumbowyg-master/dist/trumbowyg.js')}}"></script>

	@yield('js')
</body>
</html>