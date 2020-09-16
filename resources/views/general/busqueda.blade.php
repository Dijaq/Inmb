@extends('layoutgeneral')

@section('contenido')

    <div class="d-flex flex-wrap py-4">
        <div class="col-lg-5 col-md-5 p-0">
          <img src="{{asset('storage/img/map.png')}}" class="w-100 other-map" alt="" />
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="container">
             @foreach($inmuebles as $inmueble)
                <div class="row mb-4">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <!--<img src="{{asset('storage/img/room.png')}}" class="w-100" alt="" />-->
                    <div class="carousel slide" id="carousel-{{$inmueble->id}}" data-ride="carousel">
                        <div class="carousel-inner">
                            <div id="carouselExampleControls-{{$inmueble->id}}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                @foreach($inmueble->fotos as $key => $foto)
                                    <div class="carousel-item item{{ $key == 0 ? ' active' : '' }}">
                                        <img src="{{$foto->url_imagen}}" style="width: 100%" alt="Card image cap">
                                    </div>
                                @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls-{{$inmueble->id}}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls-{{$inmueble->id}}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 other-square">
                    <div class="d-flex flex-wrap h-75 align-items-center">
                    <div class="w-100">
                        <h3 class="descrip__subtitle mb-0">S/.{{$inmueble->precio}}</h3>
                        <div class="row other-descrip">
                        <div class="col-6">

                            <div>{{$inmueble->direccion}}</div>
                            <!--<div>Departamentos</div>-->
                            <div>{{$inmueble->distrito->nombre}}, {{$inmueble->provincia->nombre}}</div>
                            <div>{{$inmueble->fecha_publicacion}}</div>
                        </div>
                        <div class="col-6">
                            <div>Dueño Directo</div>
                            <div>{{$inmueble->fecha_publicacion}}</div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div
                    class="d-flex flex-wrap align-items-center justify-content-between"
                    >
                    <button class="btn other-greenButton green-background">
                        Contactar con anunciante
                    </button>
                    <a href="{{route('inmueble.detail', $inmueble->slug)}}" class="other-green">Más información</a>
                    </div>
                </div>
                </div>
            @endforeach
          </div>
        </div>
    </div>
@stop