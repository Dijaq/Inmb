@extends('layoutintranettim')

@section('contenido')

  <div class="card">
    <div class="card-header">
      <h4 class="card-title"> Lista de Tipos</h4>
      <a class="btn btn-primary" href="{{route('tipo.create')}}">Crear Tipos</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="table_paginate" class="table">
          <thead class="">
            <th>Id</th>
            <th>Nombre</th>
            <th style="text-align: center">Acciones</th>
          </thead>
          <tbody>
            @foreach($tipos as $tipo)
              <tr>  
                  <td>{{$tipo->id}}</td>
                  <td>{{$tipo->nombre}}</td>
                  </td>

                  <td align="center">
                    <a class="btn btn-info btn-sm" href="{{route('tipo.edit', $tipo->id)}}">Editar</a>
                    <form style="display: inline" method="POST" action={{route('tipo.delete', $tipo->id)}}>
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
