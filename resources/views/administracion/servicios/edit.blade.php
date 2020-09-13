@extends('layoutintranettim')

@section('contenido')

  <div align="center">
  <h2 style="text-align:center;">Servicio</h2>
  <br>
  @if(session()->has('info'))
    <h3>{{session('info')}}</h3>
  @else
      <!--<form action="/file-upload"
        class="dropzone"
        id="my-awesome-dropzone">
      </form>-->

      <div align="center">
        <form method="POST"  style="width: 60%;" action="{{route('servicio.update', $servicio->id)}}" enctype="multipart/form-data">
        {!! method_field('PUT') !!}
          {!!csrf_field()!!}
        
          <div class="row">

            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="titulo" >Nombre</label>
                <input class="form-control" type="text" name="nombre" value="{{$servicio->nombre}}">
                  {!! $errors->first('nombre', '<span class="error">:message</span>') !!}
              </div>
            </div>
            
            <!--<div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Tipo Inmueble</label>
                <select class="form-control" name="tipo" required>
                  @foreach($tipos as $tipo)     
                    @if($servicio->tipo->id == $tipo->id)    
                      <option value="{{$tipo->id}}" selected="selected">{{$tipo->nombre}}</option>
                    @else
                        <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>-->

            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Tipo Servicio</label>
                <select class="form-control" name="tipo_opcion" required>
                  @foreach($tipos_opcion as $tipo)       
                    @if($servicio->tipo_opcion == $tipo['id'])    
                      <option value="{{$tipo['id']}}" selected="selected">{{$tipo['nombre']}}</option>
                    @else
                        <option value="{{$tipo['id']}}">{{$tipo['nombre']}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>

            
            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Icono</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="validatedCustomFile" name="dir_image">
                  <label class="custom-file-label" for="validatedCustomFile">Elige una imagen</label>
                  <div class="invalid-feedback">Example invalid custom file feedback</div>
                  {!! $errors->first('dir_image', '<span class="error">:message</span>') !!}
                </div>
              </div>
            </div>

            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="titulo" >Meta</label>
                <input class="form-control" type="text" name="meta" value="{{$servicio->meta}}">
                  {!! $errors->first('meta', '<span class="error">:message</span>') !!}
              </div>
            </div>

            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="titulo" >Orden</label>
                <input class="form-control" type="text" name="orden" value="{{$servicio->orden}}">
                  {!! $errors->first('orden', '<span class="error">:message</span>') !!}
              </div>
            </div>            

          </div>
          <div class="row">
            <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Editar Servicio"></div>
          </div>
          <br><br>
        
        </form>
      </div>

     
  @endif
  </div>

@stop