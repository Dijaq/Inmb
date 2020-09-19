@extends('layoutintranettim')

@section('contenido')

  <div class="card">
    <div class="card-header">
      <h4 class="card-title"> Lista de Usuarios</h4>
      <a class="btn btn-primary" href="{{route('usuario.create')}}">Crear Usuario</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="" class="table">
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
                  <!--<form style="display: inline" method="POST" action={{route('usuario.delete', $usuario->id)}}>
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                  </form>-->
                  <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal-{{$usuario->id}}">Eliminar</a>
                     <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                    <div class="modal fade" id="exampleModal-{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-center">
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Está seguro(a) de eliminar el usuario {{$usuario->nombre}}?</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary btn-default btn-sm" data-dismiss="modal">Cancelar</button>
                                    <form style="display: inline" method="POST" action={{route('usuario.delete', $usuario->id)}}>
                                      {!! csrf_field() !!}
                                      {!! method_field('DELETE') !!}
                                      <button class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!--fin modal-->
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div>
          <nav aria-label="Page navigation example" style="align-items: center; justify-content: center;  display:flex;">
            {!!$usuarios->links()!!}
          </nav>
        </div>
      </div>
    </div>
  </div>

@stop
