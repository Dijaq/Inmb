@extends('layoutintranettim')

@section('contenido')

  <div class="card">
    <div class="card-header">
      <a class="btn btn-info btn-sm" href="{{route('tipo.index')}}">Atrás</a>
        <h4 class="card-title" style="text-align: center;">
         Atributos de {{$tipo->nombre}}</h4>
      <a class="btn btn-primary" href="{{route('atributo.create', $tipo->id)}}">Crear Atributo</a>
    </div>
    <div class="card-body">
      <form method="POST" action="{{route('atributo.reordenar', $tipo->id)}}" enctype="multipart/form-data">
      <div class="table-responsive">
        <table id="table_paginate" class="table">
          <thead class="">
            <!--<th>Id</th>-->
            <th>Orden</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Ruta Imagen</th>
            <th>Meta</th>
            <th>Acciones</th>
            
            <!--<th style="text-align: center">Acciones</th>-->
          </thead>
          <tbody>
          @foreach($atributos as $atributo)
              <tr>  
                <!--<td>{{$atributo->id}}</td>-->
                <td><input class="form-control" type="text" name="orden_{{$atributo->id}}" value="{{$atributo->orden}}" style="width: 40px; text-align: center;"></td>
                <td>{{$atributo->nombre}}</td>
                <td>{{$atributo->tipo->nombre}}</td>
                <td><img src="{{asset('storage/'.$atributo->ruta_imagen)}}" style="width: 40px" alt="Card image cap"></td>
                
                <td>{{$atributo->meta}}</td>
                
                <td align="center">
                  <a class="btn btn-info btn-sm" href="{{route('atributo.edit', $atributo->id)}}">Editar</a>
                  <!--<form style="display: inline" method="POST" action={{route('atributo.delete', $atributo->id)}}>
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                  </form>-->
                  <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal-{{$atributo->id}}">Eliminar</a>
                     <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                    <div class="modal fade" id="exampleModal-{{$atributo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-center">
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Está seguro(a) de eliminar el atributo {{$atributo->nombre}}?</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary btn-default btn-sm" data-dismiss="modal">Cancelar</button>
                                    <form style="display: inline" method="POST" action={{route('atributo.delete', $atributo->id)}}>
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
      </div>
          <input class="btn btn-primary" type="submit" value="Reordenar">
      </form>
    </div>
  </div>

@stop
