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
        
          {!!csrf_field()!!}
        
          <div class="row">
            
             <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="titulo" >Título</label>
                <input class="form-control" type="text" name="titulo" value="{{old('titulo')}}">
                  {!! $errors->first('titulo', '<span class="error">:message</span>') !!}
              </div>
            </div>
            
            <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Tipo Inmueble</label>
                <select class="form-control" name="tipo" required>
                  <option value="">[Seleccion una opción]</option>
                  @foreach($tipos as $tipo)     
                      <option value="{{$tipo->id}}" {{old('tipo') == $tipo->id ? 'selected':''}}>{{$tipo->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Tipo Operación</label>
                <select class="form-control" name="operacion" required>
                  <option value="">[Seleccion una opción]</option>
                  @foreach($operaciones as $operacion)     
                      <option value="{{$operacion->id}}" {{old('operacion') == $operacion->id ? 'selected':''}}>{{$operacion->nombre}}</option>
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
                      <option value="{{$ubicacion->id}}" {{old('ubicacion') == $ubicacion->id ? 'selected':''}}>{{$ubicacion->info_busqueda}}</option>
                  @endforeach
                </select>
              </div>
            </div>


            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="titulo" >Dirección</label>
                <input class="form-control" type="text" name="direccion" value="{{old('direccion')}}">
                  {!! $errors->first('direccion', '<span class="error">:message</span>') !!}
              </div>
            </div>            

            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="descripcion" >Descripción</label>
                <textarea rows="8" class="form-control" type="text" id="editor" name="descripcion" value="{{old('descripcion')}}"></textarea>
                  {!! $errors->first('descripcion', '<span class="error">:message</span>') !!}
              </div>
            </div>  

            <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="moneda" style="text-align:left;">Moneda</label>
                <select class="form-control" name="moneda" required>
                  <option value="">[Seleccion una opción]</option>
                  @foreach($monedas as $moneda)     
                      <option value="{{$moneda['id']}}" {{old('moneda') == $moneda['id'] ? 'selected':''}}>{{$moneda['nombre']}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="titulo" >Precio</label>
                <input class="form-control" type="text" name="precio" value="{{old('precio')}}">
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
            <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Crear Inmueble"></div>
          </div>
          <br><br>
        
        </form>
      </div>

     
  @endif
  </div>
</div>
@stop