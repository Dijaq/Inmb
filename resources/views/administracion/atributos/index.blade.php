@extends('layout')

@section('contenido')

  <h1>Atributos</h1>
  <a class="btn btn-primary" href="{{route('general.inmueble')}}" style="float: right;">Crear Atributo</a>
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
          @foreach($atributos as $atributo)
            <tr>  
                <td>{{$atributo->id}}</td>
                <td>{{$atributo->nombre}}</td>
                <td>{{$atributo->ruta_imagen}}</td>
                <td>{{$atributo->meta}}</td>
                <td>{{$atributo->orden}}</td>
                </td>

                <td align="center">
                  <a class="btn btn-info btn-sm" href="{{route('atributo.edit', $atributo->id)}}">Editar</a>
                  <form style="display: inline" method="POST" action={{route('atributo.deshabilitar', $tipo->id)}}>
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