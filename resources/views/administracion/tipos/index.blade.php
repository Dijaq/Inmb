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
                    <!--<a class="btn btn-success btn-sm" href="{{route('servicio.index', $tipo->id)}}">Servicios</a>-->
                    <a class="btn btn-info btn-sm" href="{{route('tipo.edit', $tipo->id)}}">Editar</a>
                    <!--<form style="display: inline" method="POST" action={{route('tipo.delete', $tipo->id)}}>
                      {!! csrf_field() !!}
                      {!! method_field('DELETE') !!}
                      <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>-->


                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal-{{$tipo->id}}">Eliminar</a>
                     <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                    <div class="modal fade" id="exampleModal-{{$tipo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-center">
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Está seguro(a) de eliminar el tipo {{$tipo->nombre}}?</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary btn-default btn-sm" data-dismiss="modal">Cancelar</button>
                                    <form style="display: inline" method="POST" action={{route('tipo.delete', $tipo->id)}}>
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
            {!!$tipos->links()!!}
          </nav>
        </div>
      </div>
    </div>
  </div>

@stop
