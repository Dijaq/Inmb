@extends('layout')

@section('contenido')

  <h1>Tipos</h1>
  <a class="btn btn-primary" href="{{route('general.inmueble')}}" style="float: right;">Crear Tipos</a>
  <br><br>
	<div class="table-responsive">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th style="text-align: center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tipos as $tipo)
            <tr>  
                <td>{{$tipo->id}}</td>
                <td>{{$tipo->name}}</td>
                </td>

                <td align="center">
                  <a class="btn btn-info btn-sm" href="{{route('tipo.edit', $tipo->id)}}">Editar</a>
                  <form style="display: inline" method="POST" action={{route('tipo.deshabilitar', $tipo->id)}}>
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