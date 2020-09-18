@extends('layoutgeneral')

@section('contenido')

<div class="publications section">
  <div class="container py-5">
    <h2 class="publication__title text-center">Modificar Imagen</h2>
    <div class="row mt-5">
      <div class="col-lg-12 col-md-12 mb-5">
        <div class="publication__card" style="padding: 20px;">

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
                  <form method="POST" action="{{route('publicInmuebleFotos.update', $id)}}" enctype="multipart/form-data">
                  {!! method_field('PUT') !!}
                    {!!csrf_field()!!}
                  
                    <div class="row">
                      
                      <div class="col-md-12" style="text-align:left;">
                          <label for="tipo" style="text-align:left;">Imágenes</label>
                          <input type="file" name="dir_image" id="image" class="form-control" required>
                      </div>
                  
                    </div>

                    <div class="row py-3">
                      <div class="col-md-12"><input class="btn btn-primary" type="submit" value="Modificar"></div>
                    </div>                  
                  </form>
                </div>
            </div>
        </div>
      </div>
    </div>

</div>
     
  @endif
  </div>
</div>
@stop