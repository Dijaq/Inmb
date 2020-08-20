@extends('layoutuser')

@section('contenido')

  <div align="center">
  <h1 style="text-align:center;">Nuevo Servicio</h1>
  <br>
  @if(session()->has('info'))
    <h3>{{session('info')}}</h3>
  @else
      <!--<form action="/file-upload"
        class="dropzone"
        id="my-awesome-dropzone">
      </form>-->

      <div align="center">
        <form method="POST"  style="width: 90%;" action="{{route('servicio.store')}}" enctype="multipart/form-data">
        
          {!!csrf_field()!!}
        
          <div class="row">

            <div class="col-md-3">
              <label for="titulo" style="text-align:left;">
                Nombre: 
              </label>
            </div>
              <div class="col-md-9"><input class="form-control" type="text" name="nombre" value="{{old('nombre')}}">
                {!! $errors->first('nombre', '<span class="error">:message</span>') !!}</div>
            <br><br>

            <div class="col-md-3">
              <label for="tipo" style="text-align:left;">
                Tipo:
              </label>
            </div>
            <div class="col-md-3">  
              <select class="form-control" name="tipo" required>
                <option value="">[Seleccion una opción]</option>
                @foreach($listTipos as $tipo)     
                    <option value="{{$user->id}}" {{old('tipo') == $user->id ? 'selected':''}}>{{$tipo->nombre}}</option>
                @endforeach
              </select>
            </div>

            <br><br>

          </div>
          <br>
          <div class="row">
            <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Crear Servicio"></div>
          </div>
          <br><br>
        
        </form>
      </div>

     
  @endif
  </div>

@stop