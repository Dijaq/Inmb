@extends('layoutdescripcion')

@section('contenido')

    <div class="section2">
      <div class="container py-5">
        <form method="POST" action="{{route('publicar.store')}}" enctype="multipart/form-data">
            
            {!!csrf_field()!!}
        
            <div class="row">
            
            <div class="col-md-12" style="text-align:left;">
                <div class="form-group">
                <!--<label for="titulo" >Título</label>-->
                <input placeholder="Título" class="form-control post__input maininput my-2 w-100" type="text" name="titulo" value="{{old('titulo')}}">
                    {!! $errors->first('titulo', '<span class="error">:message</span>') !!}
                </div>
            </div>
            
            <input class="form-control" type="hidden" name="tipo" value="{{$tipo}}">

            <div class="col-md-6" style="text-align:left;">
                <div class="form-group">
                <!--<label for="tipo" style="text-align:left;">Tipo Operación</label>-->
                <select class="form-control w-100 post__input maininput my-2" name="operacion" required>
                    <option value="">[Operación]</option>
                    @foreach($operaciones as $operacion)     
                        <option value="{{$operacion->id}}" {{old('operacion') == $operacion->id ? 'selected':''}}>{{$operacion->nombre}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-md-6" style="text-align:left;">
                <div class="form-group">
                <!--<label for="tipo" style="text-align:left;">Ubicación</label>-->
                <input class="form-control post__input maininput my-2 w-100" placeholder="Ubicación" type="text" name="ubicacion" id="ubicacion" value="{{old('ubicacion')}}">
                <div id="ubicacionList"></div>
                <!--<select class="form-control w-100 post__input maininput my-2" name="ubicacion" required>
                    <option value="">[Ubicación]</option>
                    @foreach($ubicaciones as $ubicacion)     
                        <option value="{{$ubicacion->id}}" {{old('ubicacion') == $ubicacion->id ? 'selected':''}}>{{$ubicacion->info_busqueda}}</option>
                    @endforeach
                </select>-->
                </div>
            </div>


            <div class="col-md-12" style="text-align:left;">
                <div class="form-group">
                <!--<label for="titulo" >Dirección</label>-->
                <input placeholder="Dirección" class="form-control post__input maininput my-2 w-100" type="text" name="direccion" value="{{old('direccion')}}">
                    {!! $errors->first('direccion', '<span class="error">:message</span>') !!}
                </div>
            </div>            

            <div class="col-md-12" style="text-align:left;">
                <div class="form-group">
                <!--<label for="descripcion" >Descripción</label>-->
                <textarea placeholder="Descripción" rows="8" class="form-control post__input maininput my-2 w-100" type="text" id="editor" name="descripcion" value="{{old('descripcion')}}"></textarea>
                    {!! $errors->first('descripcion', '<span class="error">:message</span>') !!}
                </div>
            </div>  

            <div class="col-md-4" style="text-align:left;">
                <div class="form-group">
                <!--<label for="moneda" style="text-align:left;">Moneda</label>-->
                <select class="form-control w-100 post__input maininput my-2" name="moneda" required>
                    <option value="">[Moneda]</option>
                    @foreach($monedas as $moneda)     
                        <option value="{{$moneda['id']}}" {{old('moneda') == $moneda['id'] ? 'selected':''}}>{{$moneda['nombre']}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-md-4" style="text-align:left;">
                <div class="form-group">
                <!--<label for="titulo" >Precio</label>-->
                <input placeholder="Precio" class="form-control post__input maininput my-2 w-100" type="number" step="0.01" name="precio" value="{{old('precio')}}" required>
                    {!! $errors->first('precio', '<span class="error">:message</span>') !!}
                </div>
            </div>    

            <!--<div class="col-md-4" style="text-align:left;">
                <div class="form-group">
                <input placeholder="Días de Publicación" class="form-control post__input maininput my-2 w-100" type="text" name="publicacion" value="{{old('publicacion')}}">
                    {!! $errors->first('publicacion', '<span class="error">:message</span>') !!}
                </div>
            </div>   --> 
            
            <div class="col-md-12" style="text-align:left;">
                <label for="tipo" style="text-align:left;">Imágenes</label>
                <input type="file" name="dir_images[]" id="image" multiple class="form-control post__input maininput my-2 w-100" required>
               
            </div>
            
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
                            <option value="{{$value}}" {{old('atributo-1') == $value ? 'selected':''}}>{{$value}}</option>
                        @endforeach
                    </select>   
                    </div>
                @elseif($atributo->tipo_opcion == 2)
                    
                    <div class="form-group">
                        <!--<label for="publicacion" >{{$atributo->nombre}}</label>-->
                        <input placeholder="{{$atributo->nombre}}" class="form-control post__input maininput my-2 w-100" type="text" name="atributo_{{$atributo->id}}" value="{{old('publicacion')}}">
                        {!! $errors->first('publicacion', '<span class="error">:message</span>') !!}
                    </div>
                       
                   
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
                            <option value="{{$value}}" {{old('atributo-1') == $value ? 'selected':''}}>{{$value}}</option>
                        @endforeach
                    </select>   
                    </div>
                @elseif($servicio->tipo_opcion == 2)
                    
                    <div class="form-group">
                    <!--<label for="publicacion" >{{$servicio->nombre}}</label>-->
                    <input placeholder="{{$servicio->nombre}}" class="form-control post__input maininput my-2 w-100" type="text" name="servicio_{{$servicio->id}}" value="{{old('publicacion')}}">
                        {!! $errors->first('publicacion', '<span class="error">:message</span>') !!}
                    </div>
               
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
            <div class="col-md-12">
                <!--<input class="btn btn-primary" type="submit" value="Crear Inmueble">-->
                <button type="submit" class="btn mainButton mt-3 mainButton--shadow">
                    Publicar Inmueble
                </button>
            </div>
            </div>
            <br><br>
        
        </form>
      </div>
    </div>

    <script>
  $(document).ready(function(){

  $('#ubicacion').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
          var _token = $('input[name="_token"]').val();
          $.ajax({
          url:"{{ route('inmueble.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
            $('#ubicacionList').fadeIn();  
                    $('#ubicacionList').html(data);
          }
          });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#ubicacion').val($(this).text());  
        $('#ubicacionList').fadeOut();  
    });  

  });
</script>
@stop