<style type="text/css">
  .espacio{
    margin-right: 20px;
  }

</style>
<nav class="navbar navbar-dark navbar-expand-sm sticky-top " style="background-color: rgba(24,145,48,0.5);">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>
    </button>
        <a class="navbar-brand" href="{{ route('front.index') }}" target="_blank">
      <img src="{{asset('assets/imagenes/MANADA.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="Logo Bootstrap">
      Pagina principal
      </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <div class="navbar-nav mr-auto ml-auto text-center">
         <a class="nav-item nav-link " href="{{ route('admin.index') }}">Inicio del Panel</a>
        </div>
    </div>
     @if (Auth::guest())
                            <a href="{{ route('login') }}">Iniciar sesion</a>
                            <a href="{{ route('register') }}">Registrate</a>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
  </div>
</nav>