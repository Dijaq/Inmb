<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />

    <title>Vivela o vendela</title>

    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
    />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700;800&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/fontawesome-free-5.14.0-web/css/all.css" />
    <link rel="stylesheet" href="css/dashicons.min.css" />
</head>
<body>
<header>
      <div class="green-background">
        <div class="container">
          <div class="d-flex w-100 justify-content-end py-2">
            <div>
              @if(Auth::check())
                @if(auth()->user()->rol == 'ADMIN')
                  <a class="header__link" href="{{route('tipo.index')}}">
                    <i class="fas fa-user-cog"></i>
                    <span class="ml-1">ADMINISTRACION</span>
                  </a>
                  |
                @endif
              
                <a class="header__link" href="{{route('mispublicaciones')}}">
                  <i class="fas fa-building"></i>
                  <span class="ml-1">MIS PUBLICACIONES</span>
                </a>
                |
                <a class="header__link" href="">
                  <i class="fas fa-user"></i>
                  <span class="ml-1">BIENVENIDO Diego
                  </span>
                </a>
                |
                <a class="header__link" href="{{route('logout')}}">Cerrar Sesión</a>
              @else
                <a class="header__link" href="">REGISTRO</a>
                |
                <a class="header__link" href="{{route('login')}}">
                  <i class="fas fa-user"></i>
                  <span class="ml-1">INGRESAR</span>
                </a>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="header__navbar">
        <nav
          class="container navbar navbar-expand-md navbar-expand-lg navbar-light"
          style="padding: 0"
        >
          <a class="navbar-brand" href="#">
            <img
              class="nav-img"
              src="{{ asset('storage/img/logo_green.png')}}"
              alt="brandlogo"
              id="logo"
            />
          </a>
          <span style="flex: 1 1"></span>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse justify-end"
            id="navbarTogglerDemo01"
          >
            <ul
              class="w-100 navbar-nav flex-wrap align-items-center justify-content-between header__navlist ml-auto"
            >
              <li class="nav-item">
                <a class="header__navlink nav-link" href="./myposts.html">creditos</a>
              </li>
              <li class="nav-item">
                <a class="header__navlink nav-link" href="">menu</a>
              </li>
              <li class="nav-item">
                <a class="header__publish mainButton" href="./post.html"> Publicar </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
        
    @yield('contenido')

    <footer class="green-background footer">
      <div class="container py-3">
        <div class="row py-3">
          <div class="col-lg-4 col-md-4 mb-4">
            <img src="{{ asset('storage/img/white-logo.png')}}" class="footer__image" alt="">
          </div>
          <div class="col-lg-4 col-md-4 mb-4">
            <h3 class="footer__title mb-4">Búsquedas frecuentes</h3>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link footer__link" href="#">Departamentos en Mariano Melgar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link footer__link" href="#">Departamentos en Pucarpata</a>
              </li>
              <li class="nav-item">
                <a class="nav-link footer__link" href="#">Departamentos en Hunter</a>
              </li>
              <li class="nav-item">
                <a class="nav-link footer__link" href="#">Departamentos en Sabandia</a>
              </li>
              <li class="nav-item">
                <a class="nav-link footer__link" href="#">Departamentos en Miraflores</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-4 mb-4">
            <h3 class="footer__title text-center mb-4">Tipo de Inmueble</h3>
            <ul class="nav flex-column">
                @foreach($tipos as $tipo)
                    <li class="nav-item">
                        <a class="nav-link text-center footer__link" href="#">{{$tipo->nombre}}</a>
                    </li>
                @endforeach
            </ul>
            <div class="d-flex footer__socialContainer mt-4 w-100">
              <div>
                <a href="" class="ml-1">
                  <img src="{{ asset('storage/img/youtube.png')}}" class="footer__social" alt="">
                </a>
                <a href="" class="ml-1">
                  <img src="{{ asset('storage/img/facebook.png')}}" class="footer__social" alt="">
                </a>
                <a href="" class="ml-1">
                  <img src="{{ asset('storage/img/instagram.png')}}" class="footer__social" alt="">
                </a>
              </div>
            </div>
          </div>    
        </div>
      </div>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
      integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
      crossorigin="anonymous"
    ></script>
    
</body>
</html>