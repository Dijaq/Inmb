@extends('layoutintranettim')

@section('contenido')

  <div class="card">
    <div class="card-header">
      <h4 class="card-title"> Lista de Servicios</h4>
      <!--<a class="btn btn-primary" href="{{route('servicio.create')}}">Crear Servicio</a>-->
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class="">
            <th>Id</th>
            <th>Nombre</th>
            <th>Ruta Imagen</th>
            <th>Meta</th>
            <th>Orden</th>
            <!--<th style="text-align: center">Acciones</th>-->
          </thead>
          <tbody>
          @foreach($servicios as $servicio)
              <tr>  
                <td>{{$servicio->id}}</td>
                <td>{{$servicio->nombre}}</td>
                <td>{{$servicio->ruta_imagen}}</td>
                <td>{{$servicio->meta}}</td>
                <td>{{$servicio->orden}}</td>

                <!--<td align="center">
                  <a class="btn btn-info btn-sm" href="{{route('servicio.edit', $servicio->id)}}">Editar</a>
                  <form style="display: inline" method="POST" action={{route('servicio.delete', $servicio->id)}}>
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
                </td>-->
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@stop
