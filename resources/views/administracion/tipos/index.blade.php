@extends('layoutintranettim')

@section('contenido')

  <div class="card">
    <div class="card-header">
      <h4 class="card-title"> Lista de Tipos</h4>
      <a class="btn btn-primary" href="{{route('tipo.create')}}">Crear Tipos</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="" class="table">
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
                    <a class="btn btn-primary btn-sm" href="{{route('atributo.index', $tipo->id)}}">Atributos</a>
                    <a class="btn btn-success btn-sm" href="{{route('servicio.index', $tipo->id)}}">Servicios</a>
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
        <div>
          <nav aria-label="Page navigation example" style="align-items: center; justify-content: center;  display:flex;">
            {!!$tipos->links()!!}
          </nav>
        </div>
      </div>
    </div>
  </div>

@stop
