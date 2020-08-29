@extends('layout')

@section('contenido')
    <div class="container">
        Busquedas
    </div>
    <div class="row py-4">
        <div class="col-md-6">
            <img src="{{ asset('storage/ubicacion.PNG')}}" style="width: 100%" alt="Card image cap">
        </div>
        <div class="col-md-6">
            <div class="row pb-2">
                <div class="col-md-6">
                    <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6">
                    <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6">
                    <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6">
                    <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                </div>
            </div>
        </div>
    </div>
@stop