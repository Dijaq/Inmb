<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />

    <title>Vivela o vendela</title>

    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
    />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700;800&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/fontawesome-free-5.14.0-web/css/all.css" />
    <link rel="stylesheet" href="css/dashicons.min.css" />
</head>
<body>
    <header>
      <div class="header__navbar">
        <nav
          class="container navbar navbar-expand-md navbar-expand-lg navbar-light"
          style="padding: 0"
        >
          <a class="navbar-brand" href="#">
            <img
              class="nav-img"
              src="{{ asset('storage/header_logo.PNG')}}"
              alt="brandlogo"
              id="logo"
            />
          </a>
        </nav>
      </div>
    </header>
        
    @yield('contenido')

    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
      integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
      crossorigin="anonymous"
    ></script>
    @include('sweet::alert')
</body>
</html>