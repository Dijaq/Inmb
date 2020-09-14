@extends('layoutgeneral')

@section('contenido')

    <div class="publications section">
      <div class="container py-5">
        <h2 class="publication__title text-center">Mis publicaciones</h2>
        <div class="row mt-5">
            @foreach($inmuebles as $inmb) 
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="publication__card">
                <img src="{{asset($inmb->fotos[0]->url_imagen)}}" class="w-100 card-img" alt="" />
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
                    <a href="" class="ml-1">
                        <img src="{{asset('storage/img/edit.png')}}" class="post__icon" alt="" />
                    </a>
                    <!--<a href="" class="ml-1">
                        <img src="{{asset('storage/img/trash.png')}}" class="post__icon" alt="" />
                    </a>-->
                    <form style="display: inline" method="POST" action={{route('mi-inmueble.delete', $inmb->id)}}>
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button class="btn ml-1"><img src="{{asset('storage/img/trash.png')}}" class="post__icon" alt="" /></button>
                    </form>
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