@extends('layoutgeneral')

@section('contenido')

    <div class="publications section">
      <div class="container py-5">
        <h2 class="publication__title text-center">Mis publicaciones {{auth()->user()->nombre}}</h2>
        <div class="row mt-5">
            @foreach($inmuebles as $inmb) 
            <div class="col-lg-4 col-md-6 mb-5">
                    <div class="publication__card">
                        <a href="{{route('inmueble.detail', $inmb->slug)}}">
                            <img src="{{asset($inmb->fotos[0]->url_imagen)}}" class="w-100 card-img" alt="" />
                        </a>
                        <div class="card-content">
                            <p>{{$inmb->descripcion}}</p>
                            <div class="mt-5">
                            <!--<div class="post__comment">
                                <p>
                                Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                                lorem...
                                </p>
                                <a href="">Responder</a>
                            </div>
                            <div class="post__comment">
                                <p>
                                Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                                lorem...
                                </p>
                                <a href="">Responder</a>
                            </div>
                            <div class="post__comment">
                                <p>
                                Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                                lorem...
                                </p>
                                <a href="">Responder</a>
                            </div>
                            <div class="post__comment">
                                <p>
                                Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                                lorem...
                                </p>
                                <a href="">Responder</a>
                            </div>-->
                            </div>
                        </div>
                    </div>
                <div class="post__edit">
                <div class="d-flex justify-content-end">
                    <div>
                    <a class="ml-1" href="{{route('publicInmuebleFotos.index', $inmb->id)}}">
                        <img src="{{asset('storage/img/img.png')}}" class="post__icon" alt="" />
                    </a>

                    <a href="{{route('publicar.edit', $inmb->id)}}" class="ml-1">
                        <img src="{{asset('storage/img/edit.png')}}" class="post__icon" alt="" />
                    </a>
                    <!--<a href="" class="ml-1">
                        <img src="{{asset('storage/img/trash.png')}}" class="post__icon" alt="" />
                    </a>-->
                    <!--<form style="display: inline" method="POST" action={{route('mi-inmueble.delete', $inmb->id)}}>
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button class="btn ml-1"><img src="{{asset('storage/img/trash.png')}}" class="post__icon" alt="" /></button>
                    </form>-->

                    <a href="" class="btn btn-sm" data-toggle="modal" data-target="#exampleModal-{{$inmb->id}}"><img src="{{asset('storage/img/trash.png')}}" class="post__icon" alt="" /></a>
                     <!------ ESTE ES EL MODAL QUE SE MUESTRA AL DAR CLICK EN EL BOTON "ELIMINAR" ------>
                    <div class="modal fade" id="exampleModal-{{$inmb->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-center">
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Está seguro(a) de eliminar la imagen ?</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary btn-default btn-sm" data-dismiss="modal">Cancelar</button>
                                    <form style="display: inline" method="POST" action={{route('mi-inmueble.delete', $inmb->id)}}>
                                      {!! csrf_field() !!}
                                      {!! method_field('DELETE') !!}
                                      <button class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!--fin modal-->

                    </div>
                </div>
                </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>


@stop