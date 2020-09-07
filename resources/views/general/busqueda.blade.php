@extends('layout')

@section('contenido')
        <form method="POST" action="{{route('general.busqueda')}}" enctype="multipart/form-data">
            {!!csrf_field()!!}
            <div class="py-2">
                <div class="container vive-see-more p-4">
                    <div class="row ">
                        <div class="col-md-3">
                            <select class="form-control" name="tipo">
                                <option>[ Búsqueda por Tipo ]</option>
                                @foreach($tipos as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="operacion">
                                <option>[ Búsqueda por Operación ]</option>
                                @foreach($operaciones as $operacion)
                                    <option value="{{$operacion->id}}">{{$operacion->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" style="background-color: #B54F4F;">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                    </svg>
                                </button>
                            </span>
                            </div><!-- /input-group -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <div class="row py-4">
        <div class="col-md-6">
            <img src="{{ asset('storage/ubicacion.PNG')}}" style="width: 100%" alt="Card image cap">
        </div>
        <div class="col-md-6">
             <!--Un Inmueble-->
            @foreach($inmuebles as $inmueble)
            <div class="row pb-2">
                <div class="col-md-6 px-0">
                    <div class="carousel slide" id="carousel-{{$inmueble->id}}" data-ride="carousel">
                        <div class="carousel-inner">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                @foreach($inmueble->fotos as $key => $foto)
                                    <div class="carousel-item item{{ $key == 0 ? ' active' : '' }}">
                                        <img src="{{$foto->url_imagen}}" style="width: 100%" alt="Card image cap">
                                    </div>
                                @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="row py-4">
                        <div class="col-md-12">
                            <h4>S/. {{$inmueble->precio}}</h4>
                        </div>
                        <div class="col-md-7">
                            Alameda, 306
                            Departamentos
                            Miraflores, Arequipa
                            {{$inmueble->fecha_publicacion}}
                        </div>
                        <div class="col-md-5">
                            80m2
                            Dueño Directo
                            11 DE AGOSTO
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <button type="button" class="btn footer">Contactar con anunciante</button>
                        </div>
                        <div class="col-md-5">
                            <a href="{{route('inmueble.detail', $inmueble->slug)}}" style="color: #1ab474">Mas información</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!--End un Inmuebe-->

        </div>
    </div>
@stop