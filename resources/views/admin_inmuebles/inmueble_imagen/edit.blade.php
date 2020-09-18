@extends('layoutintranettim')

@section('contenido')

<div class="card" align="center" style="width: 70%; margin-left: 15%;  ">
    <div class="card-header">
      <h4 class="card-title">Editar Imagen</h4>
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
        <form method="POST" action="{{route('inmuebleFotos.update', $id)}}" enctype="multipart/form-data">
         {!! method_field('PUT') !!}
          {!!csrf_field()!!}
        
          <div class="row">
              
            <div class="col-md-12" style="text-align:left;">
                <label for="tipo" style="text-align:left;">Imágenes</label>
                <input type="file" name="dir_image" id="image" class="form-control" required>
            </div>
        
          </div>

          <div class="row">
            <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Modificar"></div>
          </div>
          <br><br>
        
        </form>
      </div>

     
  @endif
  </div>
</div>
@stop