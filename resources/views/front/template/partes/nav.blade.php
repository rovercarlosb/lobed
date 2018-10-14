<nav class ="navbar navbar-dark navbar-expand-sm sticky-top mr-auto" style="background-color: rgba(24,145,48,0.5);">
  
        <a class="navbar-brand" href="{{ route('front.index') }}">
      <img src="{{asset('assets/imagenes/MANADA.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="Logo Bootstrap">
      LOBED
      </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <div class="navbar-nav ml-auto">
     @if (Auth::guest())
                            <a class="nav-item nav-link " href="{{ route('login') }}">Iniciar sesion</a>
                        @else
                            @if(Auth::user()->admin() or Auth::user()->dirigente())
                            <a class="nav-item nav-link" href="{{route('admin.index')}}">Panel de administrador</a>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                   


                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}" style="color: black;" 
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
  </div>
</nav>