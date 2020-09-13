@extends('layoutgeneral')

@section('contenido')
    
    <div class="publications section">
      <div class="container py-5">
        <h2 class="publication__title text-center">Últimas publicaciones</h2>
        <div class="row mt-5">
            @foreach($inmuebles as $inmb) 
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="publication__card">
                    <img src="{{asset($inmb->fotos[0]->url_imagen)}}" class="w-100 card-img" alt="" />
                    <div class="card-content">
                        <p>
                        EN CONSTRUCCIÓN | ENTREGA NOVIEMBRE 2020 |<br />
                        Departamentos de 1, 2 y 3 dormitorios dede 50m² hasta 107m².
                        Los departamentos con vista exterior y piscina en el útimo
                        piso.
                        </p>
                    </div>
                    <div class="card-end">
                        <div class="d-flex justify-content-end">
                        <div>S/.{{$inmb->precio}}</div>
                        </div>
                    </div>
                    </div>
                    <!--<button class="btn mainButton mt-3 mainButton--shadow">
                    ver más
                    </button>-->
                    <a class="btn mainButton mt-3 mainButton--shadow" href="{{route('inmueble.detail', $inmb->slug)}}">
                    ver más
                    </a>
                </div>
            @endforeach
        </div>
        <form method="POST" action="{{route('inmueble.more')}}" enctype="multipart/form-data">
            {!!csrf_field()!!}
            <input type="hidden" class="form-control" type="text" name="cantidad" value={{$cantidad}}>
            <div class="mt-3 text-center">
                <input type="submit" class="btn mainButton mt-3 mainButton--shadow" value="VER MÁS PROPIEDADES">     
            </div>    
        </form>
      </div>
    </div>

    <div class="section">
      <div class="container py-5">
        <h2 class="publication__title text-center">Constructoras Asociadas</h2>
        <div class="row mt-5">
          <div class="col-lg-4 text-center">
            <img src="{{ asset('storage/img/cumbres.png')}}" class="footer__image" alt="">
          </div>
          <div class="col-lg-4 text-center">
            <img src="{{ asset('storage/img/cumbres.png')}}" class="footer__image" alt="">
          </div>
          <div class="col-lg-4 text-center">
            <img src="{{ asset('storage/img/cumbres.png')}}" class="footer__image" alt="">
          </div>
        
        </div>
      </div>
    </div>
@stop