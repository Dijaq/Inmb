@extends('layoutdescripcion')

@section('contenido')
    <div class="section2 descrip">
      <div class="container py-5">
        <div class="row mb-4">
          <div class="col-lg-8 col-md-8">
            <div class="row">
              <div class="col-lg-8">
                <h2 class="descrip__title">
                  Departamento en Jose Luis Bustamante Y Rivero
                </h2>
              </div>
              <div class="col-lg-4">
                <div
                  class="d-flex align-items-center justify-content-end"
                  style="height: 100%"
                >
                  <div class="d-flex flex-wrap align-items-center descrip__bed">
                    <img src="{{ asset('storage/img/bed.png')}}" class="descrip__icon mr-1" alt="" />
                    <div>
                      <span>4</span><br />
                      <span>Habitaciones</span>
                    </div>
                  </div>
                  <div class="d-flex flex-wrap align-items-center descrip__bed">
                    <img src="{{ asset('storage/img/bath.png')}}" class="descrip__icon mr-1" alt="" />
                    <div>
                      <span>3</span><br />
                      <span>Baños</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="d-flex justify-content-end mt-3">
              <span class="descrip__title">S/.{{$inmueble->precio}}</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <img src="{{asset($inmueble->fotos[0]->url_imagen)}}" class="w-100" alt="" />
            <div class="mt-5">
              <div class="descrip__paragraph">
                <h3 class="descrip__subtitle">Descripción</h3>
                <p>
                  {{$inmueble->descripcion}}
                </p>
              </div>
              <div class="mt-4">
                <h3 class="descrip__subtitle">Ubicación</h3>
                <img src="{{asset('storage/img/map-mini.png')}}" class="w-100" alt="" />
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 d-none d-md-block">
            <div class="d-flex flex-wrap justify-content-between">
                @foreach($inmueble->fotos as $key => $foto)
                    <div class="descrip__mini"><img style="height: 100%" src="{{asset($foto->url_imagen)}}" class="w-100" alt="" /></div>
                @endforeach
              <!--<div class="descrip__mini"><img style="height: 100%" src="{{asset($inmueble->fotos[0]->url_imagen)}}" class="w-100" alt="" /></div>
              <div class="descrip__mini"></div>
              <div class="descrip__mini"></div>
              <div class="descrip__mini"></div>
              <div class="descrip__mini"></div>
              <div class="descrip__mini"></div>
              <div class="descrip__mini"></div>
              <div class="descrip__mini"></div>
              <div
                class="descrip__mini d-flex align-items-center justify-content-center"
              >
                <span>+10</span>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--<div class="body-one-inmueble">
        <div class="container py-4">
            <div class="row py-4">
                <div class="col-md-7">
                    <h3>{{$inmueble->titulo}}</h3>
                </div>
                <div class="col-md-5" style="text-align: right">
                    <h4>S/. {{$inmueble->precio}}</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <img src="{{asset($inmueble->fotos[0]->url_imagen) }}" style="width: 100%" alt="Card image cap">

                    <div class="row pt-4">
                        <div class="col-md-12">
                            <h4>Descripción</h4>
                        </div>
                    </div>    

                    <div class="row py-4">
                        <div class="col-md-12">
                        {{$inmueble->descripción}}
                        </div>
                    </div>

                    <div class="row py-4">
                        <div class="col-md-12">
                            <h4>Ubicación</h4>
                        </div>
                    </div>    

                    <img src="{{$inmueble->fotos[0]->url_imagen }}" style="width: 100%" alt="Card image cap">

                </div>
                <div class="col-md-4">
                    <div class="row">
                        @foreach($inmueble->fotos as $key => $foto)
                            <div class="col-md-4 p-1">
                                <img src="{{$foto->url_imagen}}" style="width: 100%" alt="Card image cap">
                            </div>
                        @endforeach
                        <!--<div class="col-md-4 p-1">
                            <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                        </div>
                        <div class="col-md-4 p-1">
                            <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                        </div>
                        <div class="col-md-4 p-1">
                            <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                        </div>
                        <div class="col-md-4 p-1">
                            <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                        </div>
                        <div class="col-md-4 p-1">
                            <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                        </div>
                        <div class="col-md-4 p-1">
                            <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                        </div>
                        <div class="col-md-4 p-1">
                            <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                        </div>
                        <div class="col-md-4 p-1">
                            <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

  
@stop