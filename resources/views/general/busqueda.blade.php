@extends('layout')

@section('contenido')
    <div class="container">
    <div class="row py-2">
        <div class="col-md-2 px-0">
            <select class="form-control search-inmueble">
                <option>Categoría</option>
            </select>
        </div>
        <div class="col-md-2 px-0">
            <select class="form-control search-inmueble">
                <option>Precio</option>
            </select>
        </div>
        <div class="col-md-2 px-0">
            <select class="form-control search-inmueble">
                <option>Habitaciones</option>
            </select>
        </div>
        <div class="col-md-2 px-0">
            <select class="form-control search-inmueble">
                <option>Area Total (m2)</option>
            </select>
        </div>
        <div class="col-md-2 px-0">
            <select class="form-control search-inmueble">
                <option>Publicado</option>
            </select>
        </div>
        <div class="col-md-2">
            <input class="form-control search-inmueble" type="text" placeholder="Búsqueda">
        </div>
    </div>
    </div>
    <div class="row py-4">
        <div class="col-md-6">
            <img src="{{ asset('storage/ubicacion.PNG')}}" style="width: 100%" alt="Card image cap">
        </div>
        <div class="col-md-6">
            <div class="row pb-2">
                <div class="col-md-6 px-0">
                    
                    
                    <div class="carousel slide" id="carousel-e" data-ride="carousel">
                        <div class="carousel-inner">
                            
                                
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                                </div>
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
                            <h4>S/. 2640</h4>
                        </div>
                        <div class="col-md-7">
                            Alameda, 306
                            Departamentos
                            Miraflores, Arequipa
                            11 DE AGOSTO
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
                            <a href=""  style="color: #1ab474">Mas informacion</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6 px-0">
                    
                    
                    <div class="carousel slide" id="carousel-e" data-ride="carousel">
                        <div class="carousel-inner">
                            
                                
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/interiores.PNG')}}" style="width: 100%" alt="Card image cap">
                                </div>
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
                            <h4>S/. 2640</h4>
                        </div>
                        <div class="col-md-7">
                            Alameda, 306
                            Departamentos
                            Miraflores, Arequipa
                            11 DE AGOSTO
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
                            <a href=""  style="color: #1ab474">Mas informacion</a>
                        </div>
                    </div>
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