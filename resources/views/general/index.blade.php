@extends('layout')

@section('contenido')
    
    <div class="imagen-portada" style="background-image:url({{asset('storage/portada_v1.PNG')}}); background-repeat: no-repeat;  background-size: 100% 100%; opacity: 0.5; height: 400px;">
        <div class="container">
            
        </div>
    </div>
    <div class="body-inmuebles">
        <div class="container py-4">
            <div class="row py-4">
                <div class="col-md-12" style="text-align:center;">
                    <h3>Últimas Publicaciones</h3>
                </div>
            </div>

            <div class="row py-4">
                @foreach($inmuebles as $inmueble)
                
                    <div class="col-md-4 py-4">
                        <div class="card" style="width: 100%;">
                            <img class="card-img-top" src="{{$inmueble->url_imagen}}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{$inmueble->inmueble->descripcion}}
                                </p>
                            </div>
                        </div>
                        <div class="btn p-2 mt-2 vive-see-more">Ver Más</div>
                    </div>
                @endforeach
            </div>

            <div class="row py-4">
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
            </div>

            <div class="row py-4">
                <div class="col-md-12" style="text-align:center;">
                    <div class="btn vive-btn-post">VER MÁS PROPIEDADES</div>    
                </div>
            </div>
            
            
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
                    <h5>Tipo de Inmueble</h5>
                    <ul class="foot_list">
                        <li>Departamentos</li>
                        <li>Lotes</li>
                        <li>Casa</li>
                        <li>Terreno</li>
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