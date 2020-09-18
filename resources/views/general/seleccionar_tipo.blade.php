@extends('layoutdescripcion')

@section('contenido')

    <div class="section2">
      <div class="container py-5">
      <form method="POST" action="{{route('publicar.create')}}" enctype="multipart/form-data">
        
        {!!csrf_field()!!}
      
        <div class="row">
          
          <div class="col-md-12" style="text-align:left;">
            <div class="form-group">
              <!--<label for="tipo" style="text-align:left;">Tipo Inmueble</label>-->
              <select class="form-control w-100 post__input maininput my-2" name="tipo" required>
                <option value="">[Seleccione Tipo de Propiedad]</option>
                @foreach($tipos as $tipo)     
                    <option value="{{$tipo->id}}" {{old('tipo') == $tipo->id ? 'selected':''}}>{{$tipo->nombre}}</option>
                @endforeach
              </select>
            </div>
          </div>   

        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="mt-3">
            <button type="submit" class="btn mainButton mt-3 mainButton--shadow">
                Continuar
            </button>
            </div>
          </div>
        </div>
        <br><br>
      
      </form>
        
      </div>
    </div>
@stop