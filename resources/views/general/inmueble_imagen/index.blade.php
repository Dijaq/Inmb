@extends('layoutgeneral')

@section('contenido')

<div class="publications section">
  <div class="container py-5">
    <h2 class="publication__title text-center">Gelería de Fotos de {{$inmueble->titulo}}</h2>
    <div class="row mt-5">
      <div class="col-lg-12 col-md-12 mb-5">
        <div class="publication__card" style="padding: 20px;">
          <div class="py-2">
            <a class="btn btn-primary" href="{{route('publicInmuebleFotos.create', $inmueble->id)}}">Nueva Foto</a>
          </div>
          <form method="POST" action="{{route('publicInmuebleFotos.reordenar')}}" enctype="multipart/form-data">
            {!!csrf_field()!!}
            <input type="hidden" value="{{$inmueble->id}}" name="id">
              <div class="table-responsive">
                <table id="table_paginate_inmueble" class="table">
                  <thead class="">
                    <th>Orden</th>
                    <th>Principal</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                    <!--<th style="text-align: center">Acciones</th>-->
                  </thead>
                  <tbody>
                  @foreach($inmuebleFotos as $foto)
                      <tr>  
                        <td><input class="form-control" type="text" name="orden_{{$foto->id}}" value="{{$foto->orden}}" style="width: 40px; text-align: center;"></td>
                        <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                @if($foto->es_destacado)
                                  <input class="form-check-input" name="destacado_{{$foto->id}}" type="checkbox" checked>     
                                @else
                                <input class="form-check-input" name="destacado_{{$foto->id}}" type="checkbox" >     
                                @endif
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                          </div>
                        </td>
                        <td><img src="{{asset($foto->url_imagen)}}" style="width: 120px" alt="Card image cap"></td>
                        <td>
                          <a class="btn btn-info btn-sm" href="">Editar</a>
                          <form style="display: inline" method="POST" action={{route('publicInmuebleFotos.delete', $foto->id)}}>
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

                <input class="btn btn-primary" type="submit" value="Reordenar">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

@stop
