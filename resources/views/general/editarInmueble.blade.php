@extends('layoutdescripcion')

@section('contenido')

    <div class="section2">
      <div class="container py-5">
      <form method="POST" action="{{route('publicar.update', $inmueble->id)}}" enctype="multipart/form-data">
            {!! method_field('PUT') !!}
            {!!csrf_field()!!}
        
            <div class="row">
            
            <div class="col-md-12" style="text-align:left;">
                <div class="form-group">
                <!--<label for="titulo" >Título</label>-->
                <input placeholder="Título" class="form-control post__input maininput my-2 w-100" type="text" name="titulo" value="{{$inmueble->titulo}}">
                    {!! $errors->first('titulo', '<span class="error">:message</span>') !!}
                </div>
            </div>

            <div class="col-md-6" style="text-align:left;">
                <div class="form-group">
                <!--<label for="tipo" style="text-align:left;">Tipo Operación</label>-->
                <select class="form-control w-100 post__input maininput my-2" name="operacion" required>
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
                <!--<label for="tipo" style="text-align:left;">Ubicación</label>-->
                <select class="form-control w-100 post__input maininput my-2" name="ubicacion" required>
                    <option value="">[Ubicación]</option>
                    @foreach($ubicaciones as $ubicacion)     
                        <@if($inmueble->ubigeo_distrito_id == $ubicacion->id)    
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
                <!--<label for="titulo" >Dirección</label>-->
                <input placeholder="Dirección" class="form-control post__input maininput my-2 w-100" type="text" name="direccion" value="{{$inmueble->direccion}}">
                    {!! $errors->first('direccion', '<span class="error">:message</span>') !!}
                </div>
            </div>            

            <div class="col-md-12" style="text-align:left;">
                <div class="form-group">
                <!--<label for="descripcion" >Descripción</label>-->
                <textarea placeholder="Descripción" rows="8" class="form-control post__input maininput my-2 w-100" type="text" id="editor" name="descripcion" value="{{$inmueble->descripcion}}">{{$inmueble->descripcion}}</textarea>
                    {!! $errors->first('descripcion', '<span class="error">:message</span>') !!}
                </div>
            </div>  

            <div class="col-md-4" style="text-align:left;">
                <div class="form-group">
                <!--<label for="moneda" style="text-align:left;">Moneda</label>-->
                <select class="form-control w-100 post__input maininput my-2" name="moneda" required>
                    <option value="">[Moneda]</option>
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

            <div class="col-md-4" style="text-align:left;">
                <div class="form-group">
                <!--<label for="titulo" >Precio</label>-->
                <input placeholder="Precio" class="form-control post__input maininput my-2 w-100" type="number" step="0.01" name="precio" value="{{$inmueble->precio}}" required>
                    {!! $errors->first('precio', '<span class="error">:message</span>') !!}
                </div>
            </div>    

            <!--<div class="col-md-4" style="text-align:left;">
                <div class="form-group">
                <input placeholder="Agregar días de Publicación" class="form-control post__input maininput my-2 w-100" type="text" name="publicacion" value="0">
                    {!! $errors->first('publicacion', '<span class="error">:message</span>') !!}
                </div>
            </div>    -->
            
            <div class="col-md-12" style="text-align:center;">
                <h4 class="card-title py-4">Atributos</h4>
            </div>

            @foreach($atributos as $atributo)
                <div class="col-md-4" style="text-align:left;">

                @if($atributo->tipo_opcion == 1)

                    <div class="form-group">
                    <label for="tipo" style="text-align:left;">{{$atributo->nombre}}</label>
                    
                        <select class="form-control w-100 post__input maininput my-2" name="atributo_{{$atributo->id}}" required>
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
                    
                    <div class="form-group">
                        <!--<label for="publicacion" >{{$atributo->nombre}}</label>-->
                        <input placeholder="{{$atributo->nombre}}" class="form-control post__input maininput my-2 w-100" type="text" name="atributo_{{$atributo->id}}" value="{{$atributo->inmueble_value}}">
                        {!! $errors->first('publicacion', '<span class="error">:message</span>') !!}
                    </div>
                       
                   
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
                <h4 class="card-title py-4">Servicios</h4>
            </div>

            @foreach($servicios as $key => $servicio)
                <div class="col-md-4" style="text-align:left;">

                @if($servicio->tipo_opcion == 1)

                    <div class="form-group">
                    <label for="tipo" style="text-align:left;">{{$servicio->nombre}}</label>
                    
                        <select class="form-control w-100 post__input maininput my-2" name="atributo_{{$servicio->id}}">
                        <option value="">[Seleccione una opción]</option>
                        @foreach(explode(",",$servicio->meta) as $value)     
                            @if($servicio->inmueble_value == $value)
                                <option value="{{$value}}" selected="selected">{{$value}}</option>
                            @else
                                <option value="{{$value}}">{{$value}}</option>
                            @endif
                        @endforeach
                    </select>   
                    </div>
                @elseif($servicio->tipo_opcion == 2)
                    
                    <div class="form-group">
                    <!--<label for="publicacion" >{{$servicio->nombre}}</label>-->
                    <input placeholder="{{$servicio->nombre}}" class="form-control post__input maininput my-2 w-100" type="text" name="servicio_{{$servicio->id}}" value="{{$servicio->inmueble_value}}">
                        {!! $errors->first('publicacion', '<span class="error">:message</span>') !!}
                    </div>
               
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
            <div class="col-md-12">
                <!--<input class="btn btn-primary" type="submit" value="Crear Inmueble">-->
                <button type="submit" class="btn mainButton mt-3 mainButton--shadow">
                    Actualizar Publicación
                </button>
            </div>
            </div>
            <br><br>
        
        </form>
      </div>
    </div>
@stop