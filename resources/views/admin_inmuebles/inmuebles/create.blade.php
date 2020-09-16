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
            
            <input class="form-control" type="hidden" name="tipo" value="{{$tipo}}">
            <!--<div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Tipo Inmueble</label>
                <select class="form-control" name="tipo" required>
                  <option value="">[Seleccione una opción]</option>
                  @foreach($tipos as $tipo)     
                      <option value="{{$tipo->id}}" {{old('tipo') == $tipo->id ? 'selected':''}}>{{$tipo->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>-->

            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Tipo Operación</label>
                <select class="form-control" name="operacion" required>
                  <option value="">[Seleccione una opción]</option>
                  @foreach($operaciones as $operacion)     
                      <option value="{{$operacion->id}}" {{old('operacion') == $operacion->id ? 'selected':''}}>{{$operacion->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <!--<div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="area" >Área</label>
                <input class="form-control" type="text" name="area" value="{{old('area')}}">
                  {!! $errors->first('area', '<span class="error">:message</span>') !!}
              </div>
            </div>-->

            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Ubicación</label>
                <select class="form-control" name="ubicacion" required>
                  <option value="">[Seleccione una opción]</option>
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
                <input class="form-control" type="number" step='0.01' name="precio" value="{{old('precio')}}" required>
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
                <label for="tipo" style="text-align:left;">Imágenes</label>
                <input type="file" name="dir_images[]" id="image" multiple class="form-control" required>
                <!--<div class="custom-file">
                  <input type="file" class="custom-file-input" id="validatedCustomFile" name="dir_image">
                  <label class="custom-file-label" for="validatedCustomFile">Elige una imagen</label>
                  <div class="invalid-feedback">Example invalid custom file feedback</div>
                  {!! $errors->first('dir_image', '<span class="error">:message</span>') !!}
                </div>-->
            </div>
            
            <div class="col-md-12" style="text-align:center;">
              <h4 class="card-title">Atributos</h4>
            </div>

            @foreach($atributos as $atributo)
              <div class="col-md-4" style="text-align:left;">

                @if($atributo->tipo_opcion == 1)

                  <div class="form-group">
                    <label for="tipo" style="text-align:left;">{{$atributo->nombre}}</label>
                    
                      <select class="form-control" name="atributo_{{$atributo->id}}" required>
                      <option value="">[Seleccione una opción]</option>
                      @foreach(explode(",",$atributo->meta) as $value)     
                          <option value="{{$value}}" {{old('atributo-1') == $value ? 'selected':''}}>{{$value}}</option>
                      @endforeach
                    </select>   
                  </div>
                @elseif($atributo->tipo_opcion == 2)
                  <div class="col-md-12" style="text-align:left;">
                    <div class="form-group">
                      <label for="publicacion" >{{$atributo->nombre}}</label>
                      <input class="form-control" type="text" name="atributo_{{$atributo->id}}" value="{{old('publicacion')}}">
                        {!! $errors->first('publicacion', '<span class="error">:message</span>') !!}
                    </div>
                  </div>    
                  <!--<label for="tipo" style="text-align:left;">{{$atributo->nombre}}</label>
                  @foreach(explode(",",$atributo->meta) as $value)   
                    <div class="form-check">
                      <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value={{$value}}>
                          {{$value}}
                          <span class="form-check-sign">
                              <span class="check"></span>
                          </span>
                      </label>
                    </div>
                  @endforeach-->
                @else
                  <label for="tipo" style="text-align:left;">{{$atributo->nombre}}</label>
                  @foreach(explode(",",$atributo->meta) as $value)   
                    <div class="radio">
                      <label>
                        <input type="radio" name="atributo_{{$atributo->id}}" value="{{$value}}">
                        {{$value}}
                      </label>
                    </div>
                  @endforeach
                @endif
              </div>
            @endforeach

            <div class="col-md-12" style="text-align:center;">
              <h4 class="card-title">Servicios</h4>
            </div>

            @foreach($servicios as $key => $servicio)
              <div class="col-md-4" style="text-align:left;">

                @if($servicio->tipo_opcion == 1)

                  <div class="form-group">
                    <label for="tipo" style="text-align:left;">{{$servicio->nombre}}</label>
                    
                      <select class="form-control" name="atributo_{{$servicio->id}}">
                      <option value="">[Seleccione una opción]</option>
                      @foreach(explode(",",$servicio->meta) as $value)     
                          <option value="{{$value}}" {{old('atributo-1') == $value ? 'selected':''}}>{{$value}}</option>
                      @endforeach
                    </select>   
                  </div>
                @elseif($servicio->tipo_opcion == 2)
                  
                  <div class="form-group">
                    <label for="publicacion" >{{$servicio->nombre}}</label>
                    <input class="form-control" type="text" name="servicio_{{$servicio->id}}" value="{{old('publicacion')}}">
                      {!! $errors->first('publicacion', '<span class="error">:message</span>') !!}
                  </div>
                     
                  <!--<label for="tipo" style="text-align:left;">{{$servicio->nombre}}</label>
                  @foreach(explode(",",$servicio->meta) as $value)   
                    <div class="form-check">
                      <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value={{$value}}>
                          {{$value}}
                          <span class="form-check-sign">
                              <span class="check"></span>
                          </span>
                      </label>
                    </div>
                  @endforeach-->
                @else
                  <label for="tipo" style="text-align:left;">{{$servicio->nombre}}</label>
                  @foreach(explode(",",$servicio->meta) as $value)   
                    <div class="radio">
                      <label>
                        <input type="radio" name="servicio_{{$servicio->id}}" value="{{$value}}">
                        {{$value}}
                      </label>
                    </div>
                  @endforeach
                @endif
              </div>
            @endforeach

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