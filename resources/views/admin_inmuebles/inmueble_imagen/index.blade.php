@extends('layoutintranettim')

@section('contenido')

  <div class="card">
    <div class="card-header">
      <h4 class="card-title"> Lista de Fotos</h4>
      <a class="btn btn-primary" href="{{route('inmuebleFotos.create', $idInmueble)}}">Nueva Foto</a>
    </div>
    <div class="card-body">

      <form method="POST" action="{{route('inmuebleFotos.reordenar')}}" enctype="multipart/form-data">
      {!!csrf_field()!!}
      <input type="hidden" value="{{$idInmueble}}" name="id">
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
                    <a class="btn btn-info btn-sm" href="{{route('inmuebleFotos.edit', $foto->id)}}">Editar</a>
                    <!--<form style="display: inline" method="POST" action={{route('inmuebleFotos.delete', $foto->id)}}>
                      {!! csrf_field() !!}
                      {!! method_field('DELETE') !!}
                      <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>-->
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal-{{$foto->id}}">Eliminar</a>
                     <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                    <div class="modal fade" id="exampleModal-{{$foto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-center">
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Está seguro(a) de eliminar la imagen ?</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary btn-default btn-sm" data-dismiss="modal">Cancelar</button>
                                    <form style="display: inline" method="POST" action={{route('inmuebleFotos.delete', $foto->id)}}>
                                      {!! csrf_field() !!}
                                      {!! method_field('DELETE') !!}
                                      <button class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!--fin modal-->
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

@stop
