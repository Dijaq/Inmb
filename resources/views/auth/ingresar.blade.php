@extends('layoutlogin')

@section('contenido')
  <div
      class="login__container container d-flex align-items-center justify-content-center"
    >
      <div class="login">
        <div class="row">
          <div class="col-lg-5 col-md-5">
            <h2 class="login__title text-center">Iniciar sesión</h2>
            <p class="text-center" style="font-size: 0.9em;">Ingresa tu correo electrónico y contraseña</p>
              <form class="mt-4" method="POST" action="{{route('usuario.login')}}">
                {!!csrf_field()!!}
                <label class="login__label" for="" >Correo electrónico</label>
                <input type="text" class="form-control login__input maininput" name="email" />
                <label class="login__label" for="">Contraseña</label>
                <input type="password" class="form-control login__input maininput" name="password" />
                <div class="pt-4">
                  <button
                  type="submit"
                  class="btn login__button green-background btn-lg btn-block"
                >
                  Iniciar sesión
                </button>
                </div>
                <div class="pt-2">
                  <a class="btn btn-primary login__button btn-lg btn-block" href="{{route('facebook.iniciarSesion')}}">
                      Login con Facebook
                  </a>
                </div>
              </form>
            <div>
              <p class="text-center" style="font-size: 0.8em;">¿No tiene cuenta? <a class="login__link" href="{{route('usuario.registro')}}">Crea una</a></p>
            </div>
            <div>
              <p class="text-center" style="font-size: 0.8em;">¿Olvidó su contraseña? <a class="login__link" href="{{route('usuario.recuperar')}}">Recuperela aquí</a></p>
            </div>
          </div>
          <div class="col-lg-7 col-md-7 d-none d-md-block">
            <img src="{{ asset('storage/img/login.png')}}" class="w-100" alt="" />
          </div>
        </div>
      </div>
    </div>
@endsection