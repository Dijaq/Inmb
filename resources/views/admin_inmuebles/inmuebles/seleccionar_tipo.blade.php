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
        <form method="POST" action="{{route('inmueble.create')}}" enctype="multipart/form-data">
        
          {!!csrf_field()!!}
        
          <div class="row">
            
            <div class="col-md-12" style="text-align:left;">
              <div class="form-group">
                <label for="tipo" style="text-align:left;">Tipo Inmueble</label>
                <select class="form-control" name="tipo" required>
                  <option value="">[Seleccione Tipo de Propiedad]</option>
                  @foreach($tipos as $tipo)     
                      <option value="{{$tipo->id}}" {{old('tipo') == $tipo->id ? 'selected':''}}>{{$tipo->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>   

          </div>
          <div class="row">
            <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Cargar Formulario"></div>
          </div>
          <br><br>
        
        </form>
      </div>

     
  @endif
  </div>
</div>
@stop