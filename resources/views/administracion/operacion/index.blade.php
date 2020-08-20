@extends('layout')

@section('contenido')

  <h1>Operaciones</h1>
  <a class="btn btn-primary" href="{{route('general.inmueble')}}" style="float: right;">Crear Operacion</a>
  <br><br>
	<div class="table-responsive">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Orden</th>
            <th style="text-align: center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($operaciones as $operacion)
            <tr>  
                <td>{{$operacion->id}}</td>
                <td>{{$operacion->name}}</td>
                <td>{{$operacion->orden}}</td>
                </td>

                <td align="center">
                  <a class="btn btn-info btn-sm" href="{{route('operacion.edit', $operacion->id)}}">Editar</a>
                  <form style="display: inline" method="POST" action={{route('operacion.deshabilitar', $tipo->id)}}>
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

@stop