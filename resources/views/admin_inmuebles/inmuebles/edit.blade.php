@extends('layoutintranettim')

@section('contenido')

<div class="card" align="center" style="width: 70%; margin-left: 15%;  ">
    <div class="card-header">
      <h4 class="card-title">Inmueble</h4>
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
        <form method="POST" action="{{route('inmueble.store')}}" enctype="multipart/form-data">
         {!! method_field('PUT') !!}
          {!!csrf_field()!!}
        
          <div class="row">
            
             <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="titulo" >Título</label>
                <input class="form-control" type="text" name="titulo" value="{{$inmueble->titulo}}">
                  {!! $errors->first('titulo', '<span class="error">:message</span>') !!}
              </div>
            </div>
            
            <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Tipo Inmueble</label>
                <select class="form-control" name="tipo" required>
                  @foreach($tipos as $tipo)     
                    @if($inmueble->tipo_id == $tipo->id)    
                        <option value="{{$tipo->id}}" selected="selected">{{$tipo->nombre}}</option>
                    @else
                        <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Tipo Operación</label>
                <select class="form-control" name="operacion" required>
                  @foreach($operaciones as $operacion)     
                    @if($inmueble->operacion_id == $operacion->id)    
                        <option value="{{$operacion->id}}" selected="selected">{{$operacion->nombre}}</option>
                    @else
                        <option value="{{$operacion->id}}">{{$operacion->nombre}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Ubicación</label>
                <select class="form-control" name="ubicacion" required>
                  <option value="">[Seleccion una opción]</option>
                  @foreach($ubicaciones as $ubicacion)     
                    @if($inmueble->ubigeo_distrito_id == $ubicacion->id)    
                        <option value="{{$ubicacion->id}}" selected="selected">{{$ubicacion->info_busqueda}}</option>
                    @else
                        <option value="{{$ubicacion->id}}">{{$ubicacion->info_busqueda}}</option>
                    @endif
                
                  @endforeach
                </select>
              </div>
            </div>


            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="titulo" >Dirección</label>
                <input class="form-control" type="text" name="direccion" value="{{$inmueble->direccion}}">
                  {!! $errors->first('direccion', '<span class="error">:message</span>') !!}
              </div>
            </div>            

            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="titulo" >Descripción</label>
                <input class="form-control" type="text" name="descripcion" value="{{$inmueble->descripcion}}">
                  {!! $errors->first('descripcion', '<span class="error">:message</span>') !!}
              </div>
            </div>  

            <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="moneda" style="text-align:left;">Moneda</label>
                <select class="form-control" name="moneda" required>
                @foreach($monedas as $moneda) 
                    @if($inmueble->moneda == $moneda['id'])    
                      <option value="{{$moneda['id']}}" selected="selected">{{$moneda['nombre']}}</option>
                    @else
                      <option value="{{$moneda['id']}}">{{$moneda['nombre']}}</option>
                    @endif
                @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="titulo" >Precio</label>
                <input class="form-control" type="text" name="precio" value="{{$inmueble->precio}}">
                  {!! $errors->first('precio', '<span class="error">:message</span>') !!}
              </div>
            </div>    

            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="publicacion" >Días de Publicación</label>
                <input class="form-control" type="text" name="publicacion" value="{{old('publicacion')}}">
                  {!! $errors->first('publicacion', '<span class="error">:message</span>') !!}
              </div>
            </div>    
            
            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Imagen</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="validatedCustomFile" name="dir_image">
                  <label class="custom-file-label" for="validatedCustomFile">Elige una imagen</label>
                  <div class="invalid-feedback">Example invalid custom file feedback</div>
                  {!! $errors->first('dir_image', '<span class="error">:message</span>') !!}
                </div>
              </div>
            </div>

            

          </div>
          <div class="row">
            <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Actualizar Inmueble"></div>
          </div>
          <br><br>
        
        </form>
      </div>

     
  @endif
  </div>
</div>

@stop