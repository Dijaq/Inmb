@extends('layoutintranettim')

@section('contenido')

  <div class="card">
    <div class="card-header">
      <h4 class="card-title"> Lista de Inmuebles</h4>
      <a class="btn btn-primary" href="{{route('inmueble.seleccion')}}">Crear Imueble</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="" class="table">
          <thead class="">
            <th>Id</th>
            <th>Titulo</th>
            <th>Tipo</th>
            <th>Moneda</th>
            <th>Precio</th>
            <th>Fecha Publicación</th>
            <th>Estado</th>
            <th>Acciones</th>
            <!--<th style="text-align: center">Acciones</th>-->
          </thead>
          <tbody>
          @foreach($inmuebles as $inmueble)
              <tr>  
                <td>{{$inmueble->id}}</td>
                <td>{{$inmueble->titulo}}</td>
                <td>{{$inmueble->tipo->nombre}}</td>
                <td>{{$inmueble->moneda}}</td>
                <td>{{$inmueble->precio}}</td>
                <td>{{$inmueble->fecha_publicacion}}</td>
                <td>
                  @if($inmueble->estado == 'PUBLICADO')
                    <form style="display: inline" method="POST" action={{route('inmueble.despublicar', $inmueble->id)}}>
                      {!! csrf_field() !!}
                      {!! method_field('DELETE') !!}
                      <button class="btn btn-success btn-sm">{{$inmueble->estado}}</button>
                    </form>
                  @else
                  <form style="display: inline" method="POST" action={{route('inmueble.publicar', $inmueble->id)}}>
                      {!! csrf_field() !!}
                      {!! method_field('DELETE') !!}
                      <button class="btn btn-danger btn-sm">{{$inmueble->estado}}</button>
                    </form>
                  @endif
                  
                </td>

                <td>
                  <a class="btn btn-success btn-sm" href="{{route('inmuebleFotos.index', $inmueble->id)}}">Galería</a>
                  <a class="btn btn-info btn-sm" href="{{route('inmueble.edit', $inmueble->id)}}">Editar</a>
                  <form style="display: inline" method="POST" action={{route('inmueble.delete', $inmueble->id)}}>
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
            {!!$inmuebles->links()!!}
          </nav>
        </div>
      </div>
    </div>
  </div>

@stop
