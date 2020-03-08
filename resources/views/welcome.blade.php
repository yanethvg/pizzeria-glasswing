<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('clientes/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clientes/css/skeleton.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clientes/css/custom.css') }}">
</head>
<body>
<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="four columns">
                <img src="{{ asset('clientes/img/logo.jpg') }}" id="logo">
            </div>
            <div class="two columns u-pull-right ">
                <ul>
                    <li class="submenu">
                            <img src="{{ asset('clientes/img/cart.png') }}" id="img-carrito">
                            <div id="carrito">
                                    <table id="lista-carrito" class="u-full-width">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <a href="#" id="vaciar-carrito" class="button u-full-width">Vaciar Carrito</a>
                            </div>

                    </li>

                </ul>


            </div>
        </div>
    </div>
    </header>


    <div id="hero">
        <div class="container">
            <div class="row">
                    <div class="six columns">
                        <div class="contenido-hero">
                                <h2>¿Qué desea comer?</h2>
                                <p>Pizzeria </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="barra">
        <div class="container">
            <div class="row">
                    <div class="four columns icono icono1">
                        <p>Deliciosas Pizzas <br>
                        Con ingredientes de Calidad</p>
                    </div>
                    <div class="four columns icono icono2">
                        <p>Cocineros Expertos <br>
                        Preparan su pizza</p>
                    </div>
                    <div class="four columns icono icono3">
                        <p>Entrega a Domicilio <br>
                        Rapidamente</p>
                    </div>
            </div>
        </div>

    </div>

    <div id="lista-cursos" class="container">
        <h1 id="encabezado" class="encabezado">Pizzas Disponibles</h1>
        <div class="row">
            <div class="four columns">
                <div class="card">
                    <img src="{{ asset('clientes/img/curso1.jpg') }}" class="imagen-curso u-full-width">
                    <div class="info-card">
                        <h4>HTML5, CSS3, JavaScript para Principiantes</h4>
                        <p>Juan Pedro</p>
                        <p class="precio">$200  <span class="u-pull-right ">$15</span></p>
                        <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="1">Agregar Al Carrito</a>
                    </div>
                </div> <!--.card-->
            </div>
            <div class="four columns">
                    <div class="card">
                        <img src="{{ asset('clientes/img/curso2.jpg') }}" class="imagen-curso u-full-width">
                        <div class="info-card">
                            <h4>Curso de Comida Vegetariana</h4>
                            <p>Juan Pedro</p>
                            <p class="precio">$200  <span class="u-pull-right ">$15</span></p>
                            <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="2">Agregar Al Carrito</a>
                        </div>
                    </div>
            </div>
            <div class="four columns">
                    <div class="card">
                        <img src="{{ asset('clientes/img/curso3.jpg') }}" class="imagen-curso u-full-width">
                        <div class="info-card">
                            <h4>Guitarra para Principiantes</h4>
                            <p>Juan Pedro</p>
                            <p class="precio">$200  <span class="u-pull-right ">$15</span></p>
                            <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="3">Agregar Al Carrito</a>
                        </div>
                    </div> <!--.card-->
            </div>

        </div> <!--.row-->

    </div>

    <footer id="footer" class="footer">
        <div class="container">
            <div class="row">
                    <div class="four columns">
                            <nav id="principal" class="menu">
                                <a class="enlace" href="#">Para tu Negocio</a>
                                <a class="enlace" href="#">Conviertete en Instructor</a>
                                <a class="enlace" href="#">Aplicaciones Móviles</a>
                                <a class="enlace" href="#">Soporte</a>
                                <a class="enlace" href="#">Temas</a>
                            </nav>
                    </div>
                    <div class="four columns">
                            <nav id="secundaria" class="menu">
                                <a class="enlace" href="#">¿Quienes Somos?</a>
                                <a class="enlace" href="#">Empleo</a>
                                <a class="enlace" href="#">Blog</a>
                            </nav>
                    </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('clientes/js/app.js') }}"></script>

</body>
</html>
