@extends('layout')

@section('contenido')
    
    <div class="imagen-portada" style="background-image:url({{asset('storage/portada_v1.PNG')}}); background-repeat: no-repeat;  background-size: 100% 100%; opacity: 0.5; height: 400px;">
        <div class="container">
            
        </div>
    </div>
    <form method="POST" action="{{route('general.busqueda')}}" enctype="multipart/form-data">
        {!!csrf_field()!!}
        <div style="position: relative; top: -100px; z-index:1000;">
            <div class="container vive-see-more p-4">
                <div class="row">
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
                        <input type="text" class="form-control" placeholder="Search for..." name="busqueda">
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
  

    <div class="body-inmuebles">
        <div class="container py-4">
            <div class="row py-4">
                <div class="col-md-12" style="text-align:center;">
                    <h3>Últimas Publicaciones</h3>
                </div>
            </div>

            <div class="row py-4">
                @foreach($inmuebles as $inmb)
                
                    <div class="col-md-4 py-4">
                        <div class="card" style="width: 100%;">
                            <img class="card-img-top" src="{{$inmb->fotos[0]->url_imagen}}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{$inmb->descripción}}
                                </p>
                                
                            </div>
                            <hr>
                            <div class="card-body" style="text-align: right">
                                <p>{{$inmb->fecha_publicacion}}</p>
                                <p class="card-text">S/. {{$inmb->precio}}</p>
                            </div>
                        </div>
                        <a class="btn p-2 mt-2 px-4 vive-see-more" href="{{route('inmueble.detail', $inmb->slug)}}">
                            VER MÁS
                        </a>
                    </div>
                @endforeach
            </div>

            <!--<div class="row py-4">
                <div class="col-md-4">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="{{ asset('storage/edificio_1.PNG')}}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">EN CONSTRUCCIÓN | ENTREGA NOVIEMBRE
                                2020 |
                                Departamentos
                                de 1, 2 y 3 dormitorios
                                dede
                                50m² hasta 107m².
                                Los
                                departamentos con vista exterior
                                y
                                piscina en el útimo piso.
                            </p>
                        </div>
                    </div>
                    <div class="btn p-2 mt-2 vive-see-more">VER MÁS</div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="{{ asset('storage/edificio_2.PNG')}}" alt="Card image cap">
                        <div class="card-body">
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum repellat nihil aspernatur quod! Labore, blanditiis aliquid optio delectus adipisci soluta voluptatem modi temporibus nisi quisquam molestias debitis mollitia iusto reiciendis.</p>
                        </div>
                    </div>
                    <div class="btn p-2 mt-2 vive-see-more">Ver Más</div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="{{ asset('storage/edificio_3.PNG')}}" alt="Card image cap">
                        <div class="card-body">
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum repellat nihil aspernatur quod! Labore, blanditiis aliquid optio delectus adipisci soluta voluptatem modi temporibus nisi quisquam molestias debitis mollitia iusto reiciendis.</p>
                        </div>
                    </div>
                    <div class="btn p-2 mt-2 vive-see-more">Ver Más</div>
                </div>
            </div>

            <div class="row py-4">
                <div class="col-md-4">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="{{ asset('storage/edificio_1.PNG')}}" alt="Card image cap">
                        <div class="card-body">
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum repellat nihil aspernatur quod! Labore, blanditiis aliquid optio delectus adipisci soluta voluptatem modi temporibus nisi quisquam molestias debitis mollitia iusto reiciendis.</p>
                        </div>
                    </div>
                    <div class="btn p-2 mt-2 vive-see-more">Ver Más</div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="{{ asset('storage/edificio_2.PNG')}}" alt="Card image cap">
                        <div class="card-body">
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum repellat nihil aspernatur quod! Labore, blanditiis aliquid optio delectus adipisci soluta voluptatem modi temporibus nisi quisquam molestias debitis mollitia iusto reiciendis.</p>
                        </div>
                    </div>
                    <div class="btn p-2 mt-2 vive-see-more">Ver Más</div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="{{ asset('storage/edificio_3.PNG')}}" alt="Card image cap">
                        <div class="card-body">
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum repellat nihil aspernatur quod! Labore, blanditiis aliquid optio delectus adipisci soluta voluptatem modi temporibus nisi quisquam molestias debitis mollitia iusto reiciendis.</p>
                        </div>
                    </div>
                    <div class="btn p-2 mt-2 vive-see-more">Ver Más</div>
                </div>
            </div>-->
            <form method="POST" action="{{route('inmueble.more')}}" enctype="multipart/form-data">
                {!!csrf_field()!!}
                <input type="hidden" class="form-control" type="text" name="cantidad" value={{$cantidad}}>
                <div class="row py-4">
                    <div class="col-md-12" style="text-align:center;">
                        <input type="submit" class="btn px-4 vive-btn-post" value="VER MÁS PROPIEDADES">    
                    </div>
                </div>    
            </form>
            
        </div>
    </div>
    <div class="body-texto">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-4">
                    <h5>Propiedades en Venta</h5>
                    <ul class="foot_list">
                        <li>Departamentos en Mariano Melgar</li>
                        <li>Departamentos en Paucarpata</li>
                        <li>Departamentos en Hunter</li>
                        <li>Departamentos en Sabandía</li>
                        <li>Departamentos en Miraflores</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Tipos de Inmueble</h5>
                    <ul class="foot_list">
                        @foreach($tipos as $tipo)
                            <li value="{{$tipo->id}}">{{$tipo->nombre}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Últimas Propiedades</h5>
                    <ul class="foot_list">
                        <li>Departamentos en Mariano Melgar</li>
                        <li>Departamentos en Paucarpata</li>
                        <li>Departamentos en Hunter</li>
                        <li>Departamentos en Sabandía</li>
                        <li>Departamentos en Miraflores</li>
                    </ul>
                </div>
            </div>

            <div class="row py-4">
                <div class="col-md-12" style="text-align:center;">
                    <h3>Constructoras Asociadas</h3>  
                </div>
            </div>

            <div class="row p-4">
                <div class="col-md-4">
                    <img src="{{ asset('storage/constructoras.PNG')}}" alt="Card image cap">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('storage/constructoras.PNG')}}" alt="Card image cap">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('storage/constructoras.PNG')}}" alt="Card image cap">
                </div>
            </div>
        </div>
    </div>
    
@stop