@extends('layout')

@section('contenido')
    <div class="body-one-inmueble">
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
                    <img src="{{$inmueble->fotos[0]->url_imagen }}" style="width: 100%" alt="Card image cap">

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
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

  
@stop