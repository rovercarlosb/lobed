<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
  <!-- Mobile Specific Meta -->

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="CodePixar">
  <!-- Meta Description -->
  <meta name="description" content="LOBED">
  <!-- Meta Keyword -->
  <meta name="keywords" content="LOBED">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
    <title>@yield('title', 'Default') | LOBED </title>


  <link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600,900" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-front/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-front/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-front/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-front/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-front/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css-front/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fotorama/pgwslideshow.css')}}">

    <style>
.stroke {
margin: 20px;
padding: 20px;
text-align:center; 
color: #132ED4;
background:;
font-family: impact;
font-size: 46px;
letter-spacing: 4px;
text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;
}
.radio span {
  margin-right: 10px;
}

@-webkit-keyframes figure
{
15%
{
-webkit-transform: translateX(5px);
transform: translateX(5px);
}
30%
{
-webkit-transform: translateX(-5px);
transform: translateX(-5px);
}
50%
{
-webkit-transform: translateX(3px);
transform: translateX(3px);
}
65%
{
-webkit-transform: translateX(-3px);
transform: translateX(-3px);
}
80%
{
-webkit-transform: translateX(2px);
transform: translateX(2px);
}
100%
{
-webkit-transform: translateX(0);
transform: translateX(0);
}
}
@keyframes swing
{
15%
{
-webkit-transform: translateX(5px);
transform: translateX(5px);
}
30%
{
-webkit-transform: translateX(-5px);
transform: translateX(-5px);
}
50%
{
-webkit-transform: translateX(3px);
transform: translateX(3px);
}
65%
{
-webkit-transform: translateX(-3px);
transform: translateX(-3px);
}
80%
{
-webkit-transform: translateX(2px);
transform: translateX(2px);
}
100%
{
-webkit-transform: translateX(0);
transform: translateX(0);
}
}
      
    figure{
      -webkit-transition: -webkit-transform 0.3s ease-in-out 0.1s; 
    }
    
  figure:hover{
      -webkit-animation: figure 1s ease;
animation: figure 1s ease;
-webkit-animation-iteration-count: 1;
animation-iteration-count: 1;
      /*-webkit-transform:scale(1.1);*/
    }

    .about-thumb {
  
-webkit-transition: -webkit-transform 0.3s ease-in-out 0.1s;
    }

   .about-thumb:hover{
   
border-radius:50%;
-webkit-border-radius:50%;
box-shadow: 0px 0px 15px 15px #ec731e;
-webkit-box-shadow: 0px 0px 15px 15px #ec731e;
transform: rotate(360deg);
-webkit-transform: rotate(360deg);

    }

    .desc a h4{
      color: #0B0000;
    }
    .desc a h4:hover {
      color:#7F09EC;

    }
    .banner-area {
    background-color: #2B9B11; 
    }

    .banner-content h1{
      color:white; 
    }

    .banner-content h1:hover{
      -webkit-animation: figure 1s ease;
animation: figure 1s ease;
-webkit-animation-iteration-count: 1;
animation-iteration-count: 1;
    }

    #principal:hover{
      -webkit-transform:rotate(15deg); /*esta propiedad nos permite dar movimiento a un elemento y sumado a esto utilizamos la linea de codigo 31 en este codigo para especificar que velocidad tendra al poner el cursor encima*/
    }

    .video-area{

      background-image: -webkit-radial-gradient(50% 50%, circle closest-side, #316CBC 0%, #2D47B9 100%);
        opacity: .8;
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
<body style="" onload="display_c(120);">  

  @include('front.template.partes.nav')
  		
	@include('front.template.partes.head')

  @yield('contenido')
		
	  <script src="{{asset('assets/js-front/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js-front/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js-front/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/js-front/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/fontawesome-all.js')}}"></script>      
    <script src="{{asset('assets/js-front/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js-front/main.js')}}"></script>
    <script src="{{asset('assets/fotorama/pgwslideshow.js')}}"></script>

	@yield('js')

<script type="text/javascript">
//<![CDATA[
var audios = new Array();
function rep(elaudio){

audios=document.getElementsByTagName('audio');
var i;
for (i=0; i<audios.length; i++) {
if (audios[i].id==elaudio){
audios[i].load();
audios[i].play();
}else{
audios[i].pause();
}
}

}

$(document).ready(function() {
    $('.pgwSlideshow').pgwSlideshow();
});

//]]>
</script>  
</body>
</html>