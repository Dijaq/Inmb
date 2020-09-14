@extends('layoutintranettim')

@section('contenido')

<div class="card" align="center" style="width: 70%; margin-left: 15%;  ">
    <div class="card-header">
      <h4 class="card-title">Inmueble</h4>
    </div>
    <div class="card-body">

  @if(session()->has('info'))
    <h3>{{session('info')}}</h3>
  @else

      <div align="center">
        <form method="POST" action="{{route('inmueble.update', $inmueble->id)}}" enctype="multipart/form-data">
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

            <div class="col-md-6" style="text-align:left;">
              <div class="form-group">
                <label for="area" >Área</label>
                <input class="form-control" type="text" name="area" value="{{$inmueble->area}}">
                  {!! $errors->first('area', '<span class="error">:message</span>') !!}
              </div>
            </div>

            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Ubicación</label>
                <select class="form-control" name="ubicacion" required>
                  @foreach($ubicaciones as $ubicacion)     
                      <option value="{{$ubicacion->id}}" {{old('ubicacion') == $ubicacion->id ? 'selected':''}}>{{$ubicacion->info_busqueda}}</option>
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
                <label for="descripcion" >Descripción</label>
                <textarea rows="8" class="form-control" type="text" id="editor" name="descripcion" value="{{$inmueble->descripcion}}">{{$inmueble->descripcion}}</textarea>
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
                <label for="publicacion" >Aumentar N días de publicacion</label>
                <input class="form-control" type="text" name="publicacion" value="0">
                  {!! $errors->first('publicacion', '<span class="error">:message</span>') !!}
              </div>
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
                          @if($atributo->inmueble_value == $value)    
                            <option value="{{$value}}" selected="selected">{{$value}}</option>
                          @else
                              <option value="{{$value}}">{{$value}}</option>
                          @endif
                      @endforeach
                    </select>   
                  </div>
                @elseif($atributo->tipo_opcion == 2)
                  <label for="tipo" style="text-align:left;">{{$atributo->nombre}}</label>
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
                  @endforeach
                @else
                  <label for="tipo" style="text-align:left;">{{$atributo->nombre}}</label>
                  @foreach(explode(",",$atributo->meta) as $value)   
                    <div class="radio">
                      <label>
                      @if(strcmp($atributo->inmueble_value, $value) == 0)
                        <input type="radio" name="atributo_{{$atributo->id}}" value="{{$value}}" checked>
                      @else
                        <input type="radio" name="atributo_{{$atributo->id}}" value="{{$value}}">
                      @endif
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
                          @if($servicio->inmueble_value == $value)
                            <option value="{{$value}}" selected="selected">{{$value}}</option>
                          @else
                              <option value="{{$value}}">{{$value}}</option>
                          @endif
                      @endforeach
                    </select>   
                  </div>
                @elseif($servicio->tipo_opcion == 2)
                  <label for="tipo" style="text-align:left;">{{$servicio->nombre}}</label>
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
                  @endforeach
                @else
                  <label for="tipo" style="text-align:left;">{{$servicio->nombre}}</label>
                  @foreach(explode(",",$servicio->meta) as $value)   
                    <div class="radio">
                      <label>
                        @if(strcmp($servicio->inmueble_value, $value) == 0)
                          <input type="radio" name="servicio_{{$servicio->id}}" value="{{$value}}" checked>
                        @else
                          <input type="radio" name="servicio_{{$servicio->id}}" value="{{$value}}">
                        @endif
                        {{$value}}
                      </label>
                    </div>
                  @endforeach
                @endif
              </div>
            @endforeach

          </div>

          <div class="row">
            <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Editar Inmueble"></div>
          </div>
          <br><br>
        
        </form>
      </div>

     
  @endif
  </div>
</div>
@stop