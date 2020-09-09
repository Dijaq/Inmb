@extends('layoutintranettim')

@section('contenido')

  <div class="card">
    <div class="card-header">
      <h4 class="card-title"> Lista de Operaciones</h4>
      <a class="btn btn-primary" href="{{route('operacion.create')}}">Crear Operación</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class="">
            <th>Id</th>
            <th>Nombre</th>
            <th>Orden</th>
            <th style="text-align: center">Acciones</th>
          </thead>
          <tbody>
            @foreach($operaciones as $operacion)
              <tr>  
                <td>{{$operacion->id}}</td>
                <td>{{$operacion->nombre}}</td>
                <td>{{$operacion->orden}}</td>

                <td align="center">
                  <a class="btn btn-info btn-sm" href="{{route('operacion.edit', $operacion->id)}}">Editar</a>
                  <form style="display: inline" method="POST" action={{route('operacion.delete', $operacion->id)}}>
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
