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
                            <div>{{$inmueble->area}}m2</div>
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
            <!--<div class="row mb-4">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="{{asset('storage/img/room.png')}}" class="w-100" alt="" />
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 other-square">
                <div class="d-flex flex-wrap h-75 align-items-center">
                  <div class="w-100">
                    <h3 class="descrip__subtitle mb-0">S/.2.654</h3>
                    <div class="row other-descrip">
                      <div class="col-6">
                        <div>Alameda, 306</div>
                        <div>Departamentos</div>
                        <div>Miraflores, Arequipa</div>
                        <div>11 DE AGOSTO</div>
                      </div>
                      <div class="col-6">
                        <div>80m2</div>
                        <div>Dueño Directo</div>
                        <div>11 DE AGOSTO</div>
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
                  <a href="" class="other-green">Más información</a>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="img/room.png" class="w-100" alt="" />
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 other-square">
                <div class="d-flex flex-wrap h-75 align-items-center">
                  <div class="w-100">
                    <h3 class="descrip__subtitle mb-0">S/.2.654</h3>
                    <div class="row other-descrip">
                      <div class="col-6">
                        <div>Alameda, 306</div>
                        <div>Departamentos</div>
                        <div>Miraflores, Arequipa</div>
                        <div>11 DE AGOSTO</div>
                      </div>
                      <div class="col-6">
                        <div>80m2</div>
                        <div>Dueño Directo</div>
                        <div>11 DE AGOSTO</div>
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
                  <a href="" class="other-green">Más información</a>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="img/room.png" class="w-100" alt="" />
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 other-square">
                <div class="d-flex flex-wrap h-75 align-items-center">
                  <div class="w-100">
                    <h3 class="descrip__subtitle mb-0">S/.2.654</h3>
                    <div class="row other-descrip">
                      <div class="col-6">
                        <div>Alameda, 306</div>
                        <div>Departamentos</div>
                        <div>Miraflores, Arequipa</div>
                        <div>11 DE AGOSTO</div>
                      </div>
                      <div class="col-6">
                        <div>80m2</div>
                        <div>Dueño Directo</div>
                        <div>11 DE AGOSTO</div>
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
                  <a href="" class="other-green">Más información</a>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="img/room.png" class="w-100" alt="" />
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 other-square">
                <div class="d-flex flex-wrap h-75 align-items-center">
                  <div class="w-100">
                    <h3 class="descrip__subtitle mb-0">S/.2.654</h3>
                    <div class="row other-descrip">
                      <div class="col-6">
                        <div>Alameda, 306</div>
                        <div>Departamentos</div>
                        <div>Miraflores, Arequipa</div>
                        <div>11 DE AGOSTO</div>
                      </div>
                      <div class="col-6">
                        <div>80m2</div>
                        <div>Dueño Directo</div>
                        <div>11 DE AGOSTO</div>
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
                  <a href="" class="other-green">Más información</a>
                </div>
              </div>
            </div>-->
          </div>
        </div>
    </div>

    <!--    <form method="POST" action="{{route('general.busqueda')}}" enctype="multipart/form-data">
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
                            </div>
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
                            <a href="{{route('inmueble.detail', $inmueble->slug)}}" style="color: #262A34">Mas información</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            

        </div>
    </div>-->
@stop