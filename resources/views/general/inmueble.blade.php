@extends('layout')

@section('contenido')
    <div class="body-one-inmueble">
        <div class="container py-4">
            <div class="row py-4">
                <div class="col-md-7">
                    <h3>Departamento en José Luis Bustamante y Rivero</h3>
                </div>
                <div class="col-md-5" style="text-align: right">
                    <h4>S/. 1,500</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <img src="{{ asset('storage/edificio_1.PNG')}}" style="width: 100%" alt="Card image cap">

                    <div class="row pt-4">
                        <div class="col-md-12">
                            <h4>Descripción</h4>
                        </div>
                    </div>    

                    <div class="row py-4">
                        <div class="col-md-12">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, quo neque laborum nam culpa numquam? Quos deleniti iusto aliquid perferendis quod, reprehenderit corrupti excepturi porro, molestias tempore a facere delectus.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam libero sapiente excepturi ad nemo nostrum saepe rerum architecto soluta ratione corporis placeat reprehenderit dolore eveniet repudiandae consectetur nulla, consequatur quod.
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum, cum! Molestiae omnis asperiores vero debitis sit incidunt ut, cupiditate consectetur laborum quae quidem vel, sint voluptates iusto dignissimos eaque atque.
                        </div>
                    </div>

                    <div class="row py-4">
                        <div class="col-md-12">
                            <h4>Ubicación</h4>
                        </div>
                    </div>    

                    <img src="{{ asset('storage/ubicacion.PNG')}}" style="width: 100%" alt="Card image cap">

                </div>
                <div class="col-md-4">
                    <div class="row">
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
    </div>

  
@stop