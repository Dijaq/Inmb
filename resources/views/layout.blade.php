<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <div class="container_header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/header_logo.PNG')}}" alt="" >
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-center">
                            <div class="btn p-2 vive-btn">Creditos</div>
                            <div class="btn p-2 vive-btn">Menu</div>
                            <div class="btn p-2 vive-btn-post">Publicar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    @yield('contenido')

    <div class="footer">
        <div class="container py-2">
            <div class="row py-4">
                <div class="col-md-4">
                <img src="{{ asset('storage/vivela.PNG')}}" alt="">
                </div>
                <div class="col-md-5">
                    <h4>Búsquedas Frecuentes</h4>
                    <ul class="foot_list">
                        <li>Departamentos en Mariano Melgar</li>
                        <li>Departamentos en Paucarpata</li>
                        <li>Departamentos en Hunter</li>
                        <li>Departamentos en Sabandía</li>
                        <li>Departamentos en Miraflores</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>Tipo de Inmueble</h4>
                    <ul class="foot_list">
                        <li>Departamentos</li>
                        <li>Lotes</li>
                        <li>Casa</li>
                        <li>Terreno</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>