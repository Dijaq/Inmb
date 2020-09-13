@extends('layoutintranettim')

@section('contenido')

<div class="card" align="center" style="width: 80%; margin-left: 10%;  ">
    <div class="card-header">
      <h4 class="card-title">Usuario</h4>
    </div>
    <div class="card-body">

 <!-- <div align="center">
  <h2 style="text-align:center;">Inmueble</h2>
  <br>-->
  @if(session()->has('info'))
    <h3>{{session('info')}}</h3>
  @else
      <!--<form action="/file-upload"
        class="dropzone"
        id="my-awesome-dropzone">
      </form>-->

      <div align="center">
        <form method="POST" action="{{route('usuario.update', $usuario->id)}}" enctype="multipart/form-data">
          {!! method_field('PUT') !!}
          {!!csrf_field()!!}
        
          <div class="row">
            
             <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="nombres" >Nombres</label>
                <input class="form-control" type="text" name="nombres" value="{{$usuario->persona->nombres}}">
                  {!! $errors->first('nombres', '<span class="error">:message</span>') !!}
              </div>
            </div>
            
            <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="apellidos" >Apellidos</label>
                <input class="form-control" type="text" name="apellidos" value="{{$usuario->persona->apellidos}}">
                  {!! $errors->first('apellidos', '<span class="error">:message</span>') !!}
              </div>
            </div>

            <div class="col-md-4" style="text-align:left;">
              <div class="form-group">
                <label for="dni" >Dni</label>
                <input class="form-control" type="text" name="dni" value="{{$usuario->persona->dni}}">
                  {!! $errors->first('dni', '<span class="error">:message</span>') !!}
              </div>
            </div>
            
            <div class="col-md-4" style="text-align:left;">
              <div class="form-group">
                <label for="email" >Email</label>
                <input class="form-control" type="text" name="email" value="{{$usuario->persona->correo}}">
                  {!! $errors->first('email', '<span class="error">:message</span>') !!}
              </div>
            </div>

            <div class="col-md-4" style="text-align:left;">
              <div class="form-group">
                <label for="celular" >Celular</label>
                <input class="form-control" type="text" name="celular" value="{{$usuario->persona->telefono}}">
                  {!! $errors->first('celular', '<span class="error">:message</span>') !!}
              </div>
            </div>

            <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="rol" style="text-align:left;">Rol</label>
                <select class="form-control" name="rol" required>
                  @foreach($roles as $rol)     
                    @if($usuario->rol == $rol['id'])    
                      <option value="{{$rol['id']}}" selected="selected">{{$rol['nombre']}}</option>
                    @else
                        <option value="{{$rol['id']}}">{{$rol['nombre']}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>


            <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="nombre_usuario" >Nombre Usuario</label>
                <input class="form-control" type="text" name="nombre_usuario" value="{{$usuario->nombre}}">
                  {!! $errors->first('nombre_usuario', '<span class="error">:message</span>') !!}
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Editar Usuario"></div>
          </div>
          <br><br>
        
        </form>
      </div>

     
  @endif
  </div>
</div>
@stop