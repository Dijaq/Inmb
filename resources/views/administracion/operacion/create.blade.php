@extends('layoutuser')

@section('contenido')

  <div style="text-align:center;" align="center" >
    <h1 >Nueva Operación</h1>
    <br>
    @if(session()->has('info'))
      <h3>{{session('info')}}</h3>
    @else
        <div align="center">
          <form style="width: 50%;" method="POST" action="{{route('operacion.store')}}">
          
            {!!csrf_field()!!}
          
            <div class="row" >
          
              <div class="col-md-4">
                <label for="nombre" style="text-align:left;">
                  Nombre:
                </label>
              </div>
                <div class="col-md-8"><input class="form-control" type="text" name="nombre" value="{{old('nombre')}}">
                  {!! $errors->first('nombre', '<span class="error">:message</span>') !!}</div>
              <br><br>
              <div class="col-md-4">
                <label for="url_publicidad" style="text-align:left;">
                  Orden:
                </label>
              </div>
              <div class="col-md-8">
                <input class="form-control" type="text" name="orden" value="{{old('orden')}}">
                {!! $errors->first('orden', '<span class="error">:message</span>') !!}
              </div>
                    <br><br>
              <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Crear Operacion"></div>
            </div>
          
          </form>
        </div>
      
    @endif
  </div>
@stop