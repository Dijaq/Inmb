@extends('layoutintranettim')

@section('contenido')

  <div class="card">
    <div class="card-header">
      <h4 class="card-title"> Lista de Usuarios</h4>
      <a class="btn btn-primary" href="{{route('usuario.create')}}">Crear Usuario</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="table_paginate" class="table">
          <thead class="">
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Número</th>
            <th>Acciones</th>
            <!--<th style="text-align: center">Acciones</th>-->
          </thead>
          <tbody>
          @foreach($usuarios as $usuario)
              <tr>  
                <td>{{$usuario->persona->nombres}}</td>
                <td>{{$usuario->persona->apellidos}}</td>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->persona->correo}}</td>
                <td>{{$usuario->persona->telefono}}</td>
              
                <td align="center">
                  <a class="btn btn-info btn-sm" href="{{route('usuario.edit', $usuario->id)}}">Editar</a>
                  <form style="display: inline" method="POST" action={{route('usuario.delete', $usuario->id)}}>
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
