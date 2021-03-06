@extends('layoutlogin')

@section('contenido')
  <div
      class="login__container container d-flex align-items-center justify-content-center"
    >
      <div class="login">
        <div class="row">
          <div class="col-lg-5 col-md-5">
            <h2 class="login__title text-center">Ingrese el correo electrónico de su cuenta</h2>
            <!--<p class="text-center" style="font-size: 0.9em;">Ingresa tu correo electrónico y contraseña</p>-->
              <form class="mt-4" method="POST" action="{{route('usuario.cambiarContrasenia')}}">
                {!!csrf_field()!!}
                <label class="login__label" for="" >Ingrese una nueva contraseña</label>
                <input type="password" class="form-control login__input maininput" name="nuevo_password" />
                
                <label class="login__label" for="" >Vuelva a ingresar la contraseña</label>
                <input type="password" class="form-control login__input maininput" name="nuevo_password_2" />
                
                <input type="hidden" class="form-control login__input maininput" value="{{$id}}" name="id" />

                <div class="pt-4">
                  <button
                  type="submit"
                  class="btn login__button green-background btn-lg btn-block"
                >
                  Cambiar Contraseña
                </button>
                </div>
                
              </form>
          </div>
          <div class="col-lg-7 col-md-7 d-none d-md-block">
            <img src="{{ asset('storage/img/login.png')}}" class="w-100" alt="" />
          </div>
        </div>
      </div>
    </div>
@endsection