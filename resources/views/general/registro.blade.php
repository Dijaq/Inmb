@extends('layoutdescripcion')

@section('contenido')

    <div class="section2">
      <div class="container py-5">
        <form method="POST" class="row" action="{{route('usuario.registrostore')}}">

        {!!csrf_field()!!}

          <div class="col-4">
            <input
              type="text"
              class="form-control post__input maininput my-2 w-100"
              placeholder="Nombre Completo"
              name="nombres"
            />
          </div>
          <!--<div class="col-lg-6 col-md-6">
            <input
                type="text"
                class="form-control post__input maininput my-2 w-100"
                placeholder="Apellidos"
                name="apellidos"
                />
          </div>
          <div class="col-lg-4 col-md-4">
            <input
                type="text"
                class="form-control post__input maininput my-2 w-100"
                placeholder="Documento"
                name="dni"
                />
          </div>-->
          <div class="col-lg-4 col-md-4">
            <input
                type="text"
                class="form-control post__input maininput my-2 w-100"
                placeholder="Correo Electrónico"
                name="email"
                />
          </div>

          <!--<div class="col-lg-4 col-md-4">
            <input
                type="text"
                class="form-control post__input maininput my-2 w-100"
                placeholder="Número Telefónico"
                name="celular"
                />
          </div>
          <div class="col-lg-6 col-md-6">
            <input
                type="text"
                class="form-control post__input maininput my-2 w-100"
                placeholder="Nombre Usuario"
                name="nombre_usuario"
                />
          </div>-->
          <div class="col-lg-4 col-md-4">
            <input
              type="password"
              class="form-control post__input maininput my-2 w-100"
              placeholder="Contraseña"
              name="password"

            />
          </div>

          <div class="col-lg-12 mt-3">
            <button type="submit" class="btn mainButton mt-3 mainButton--shadow">
                Registrar
            </button>
        </div>
          
        </form>
        
      </div>
    </div>
@stop