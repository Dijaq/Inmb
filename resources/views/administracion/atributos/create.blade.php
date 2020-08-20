@extends('layoutuser')

@section('contenido')

  <div align="center">
  <h1 style="text-align:center;">Servicio</h1>
  <br>
  @if(session()->has('info'))
    <h3>{{session('info')}}</h3>
  @else
      <!--<form action="/file-upload"
        class="dropzone"
        id="my-awesome-dropzone">
      </form>-->

      <div align="center">
        <form method="POST"  style="width: 90%;" action="{{route('atributo.store')}}" enctype="multipart/form-data">
        
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
                Tipos:
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

            <div class="col-md-3">
              <label for="ruta_imagen" style="text-align:left;">
                Imagen: 
              </label>
            </div>
              <div class="col-md-9"><input class="form-control" type="text" name="ruta_imagen" value="{{old('ruta_imagen')}}">
                {!! $errors->first('ruta_imagen', '<span class="error">:message</span>') !!}</div>
            <br><br>

            <div class="col-md-3">
              <label for="tipo" style="text-align:left;">
                Tipo: 
              </label>
            </div>
              <div class="col-md-9"><input class="form-control" type="text" name="tipo" value="{{old('tipo')}}">
                {!! $errors->first('tipo', '<span class="error">:message</span>') !!}</div>
            <br><br>

            <div class="col-md-3">
              <label for="titulo" style="text-align:left;">
                Meta: 
              </label>
            </div>
              <div class="col-md-9"><input class="form-control" type="text" name="meta" value="{{old('meta')}}">
                {!! $errors->first('meta', '<span class="error">:message</span>') !!}</div>
            <br><br>

            <div class="col-md-3">
              <label for="orden" style="text-align:left;">
                Orden: 
              </label>
            </div>
              <div class="col-md-9"><input class="form-control" type="text" name="orden" value="{{old('orden')}}">
                {!! $errors->first('orden', '<span class="error">:message</span>') !!}</div>
            <br><br>

          </div>
          <br>
          <div class="row">
            <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Crear Atributo"></div>
          </div>
          <br><br>
        
        </form>
      </div>

     
  @endif
  </div>

@stop