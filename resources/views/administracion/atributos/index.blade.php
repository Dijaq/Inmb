@extends('layoutintranettim')

@section('contenido')

  <div class="card">
    <div class="card-header">
      <h4 class="card-title"> Lista de Atributos</h4>
      <a class="btn btn-primary" href="{{route('atributo.create', $tipo_id)}}">Crear Atributo</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="table_paginate" class="table">
          <thead class="">
            <th>Id</th>
            <th>Orden</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Ruta Imagen</th>
            <th>Meta</th>
            
            <!--<th style="text-align: center">Acciones</th>-->
          </thead>
          <tbody>
          @foreach($atributos as $atributo)
              <tr>  
                <td>{{$atributo->id}}</td>
                <td>{{$atributo->orden}}</td>
                <td>{{$atributo->nombre}}</td>
                <td>{{$atributo->tipo->nombre}}</td>
                <td><img src="{{asset('storage/'.$atributo->ruta_imagen)}}" style="width: 40px" alt="Card image cap"></td>
                
                <td>{{$atributo->meta}}</td>
                
                <td align="center">
                  <a class="btn btn-info btn-sm" href="{{route('atributo.edit', $atributo->id)}}">Editar</a>
                  <form style="display: inline" method="POST" action={{route('atributo.delete', $atributo->id)}}>
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@stop
