<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
         <link rel="stylesheet" type="text/css" href="{{asset('assets/Trumbowyg-master/dist/ui/trumbowyg.min.css')}}">
         <link rel="stylesheet" type="text/css" href="{{asset('assets/chosen/chosen.css')}}">
          <link rel="stylesheet" href="{{asset('assets/css-front/font-awesome.min.css')}}">
    <style type="text/css">
        
        table, th, td {
        border: 1px solid black;
        margin: auto;
    }
        html {
        }
        body {
        font-family: "Times New Roman", serif;
        }
        hr {
            border: 2px solid #0B0A0A;
            margin-bottom: 4px;
       
    </style>

        <title>Resultados de los lobatos | Lobed </title>
    </head>
<body>  
    
    <img src="{{asset('assets/imagenes/4.jpg')}}" alt="" class="img-fluid" style="margin: auto;" width="80px" height="100px">
    <br><br>

    <h2 style="text-align: center;"> Resultados de los lobatos</h2>
         <br><br>

    <div class="row">          
    <table >
        <thead>
            <th>Codigo del lobato</th>
            <th>Nombre</th>
            <th>Prueba realizada</th>
            <th>Calificación obtenida</th>
        </thead>        
        <tbody>
            <tr>
            @foreach($resultados as $resultado)
                <tr>
                    <td>{{$resultado->id}}</td>
                    <td>{{$resultado->user->name}}</td>
                    <td>{{$resultado->prueba->nombre}}</td>
                    <td>{{$resultado->calificacion}}</td>
                </tr>
            @endforeach
        </tbody>
</div>

<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script> 
    <script src="{{asset('assets/chosen/chosen.jquery.js')}}"></script>             
    <script src="{{asset('assets/fontawesome-all.js')}}"></script>          
    <script src="{{asset('assets/Trumbowyg-master/dist/trumbowyg.js')}}"></script>

    </body>
    </html>