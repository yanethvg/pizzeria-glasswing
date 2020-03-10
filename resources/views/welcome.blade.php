<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pizzeria Glasswing</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('clientes/css/normalize.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('clientes/css/skeleton.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clientes/css/custom.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">

</head>
<body  >
<div id="pizzas" v-cloak class="container-fluid">
<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="four columns">
                <h3>Pizzeria Glasswing</h3>
            </div>
            <div class="one columns u-pull-right ">
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
                                        <tbody v-for="car in carrito">
                                                <td >
                                                   <img v-bind:src="car['img'] | toCard"  >
                                                </td>
                                                <td> @{{ car['name_pizza'] }} </td>
                                                <td> @{{ totalSum(car.extraIngredients,car.price) }} </td>
                                                <td>
                                                    <a class="borrar-curso"  v-on:click.prevent="deleteCarrito(car)"> X </a>
                                                </td>
                                        </tbody>
                                    </table>
                                    <a  class="u-full-width button button-custom-agregar input" data-id="1" v-on:click.prevent="saveStorage" v-if='carrito.length>0'>Realizar Pedido</a>
                                    <a id="vaciar-carrito" class="button u-full-width" v-on:click.prevent="cleanCarrito" >Vaciar Carrito</a>
                            </div>

                    </li>
                </ul>
            </div>
            @auth
            <div class="one columns u-pull-right">
                <ul>
                    <li >
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <img src="{{ asset('clientes/img/exit.png') }}" >
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>
                </ul>
            </div>
            @endauth
        </div>
    </div>
    </header>


    <div id="hero">
        <div class="container">
            <div class="row">
                    <div class="six columns">
                        <div class="contenido-hero">
                                <h2>¿Qué desea comer?</h2>
                                @auth
                                <p style="color:white; margin: 1px">Revisa tus Pedidos</p>
                                <a href="/mispedidos" class="button button-custom" data-id="1">Mis Pedidos</a>
                                @else
                                <p style="color:white; margin:1px">Para poder realizar pedidos</p>
                                <a href="{{route('login')}}" class="button button-custom" data-id="1">Ingrese a su cuenta</a>
                                <p style="color:white; margin:1px">Crear su cuenta</p>
                                <a href="{{route('register')}}" class="button button-custom" data-id="1">Registrarse</a>

                                @endauth

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
        <div class="row" style="margin-top:20px">
            <div class="one-third column">&nbsp;</div>
            <div class="one-third column">
                <div class="card"  >
                    <img src="https://irecetasfaciles.com/wp-content/uploads/2019/01/pizza-con-salami-chorizo-beacon.jpg" class="imagen-curso u-full-width">
                    <div class="info-card">
                        <h4>Personalize su pizza</h4>
                        <p>Precio: <span class="u-pull-right ">$$$</span></p>
                        <a href="#" class="u-full-width button button-custom-agregar input" data-id="1" v-on:click.prevent="showPizza(personalizada)">Crear Pizza</a>
                    </div>
                </div>
           </div>
           <div class="one-third column">&nbsp;</div>
        </div>


        <h1 id="encabezado" class="encabezado">Pizzas Disponibles</h1>
        <div class="row" v-for="pizzaSlice in pizzasSlice" >
            <div class="four columns"  v-for="pizza in pizzaSlice">
                <div class="card"  >
                    <img v-bind:src="pizza.img | toTable " class="imagen-curso u-full-width">
                    <div class="info-card">
                        <h4>@{{ pizza.name_pizza}}</h4>
                        <p>Precio: <span class="u-pull-right ">$ @{{ pizza.price }}</span></p>
                        <a class="u-full-width button button-custom input agregar-carrito"  v-on:click.prevent="addCarrito(pizza)"  data-id="1">Agregar Al Carrito</a>
                        <a  class="u-full-width button button-custom-agregar input" data-id="1" v-on:click.prevent="showPizza(pizza)">Agregar Ingredientes</a>
                    </div>
                </div> <!--.card-->
           </div>
        </div> <!--.row-->
    </div>
   <div class="container" style="margin-top:15px">
   <div class="row">
    <div class="one-third column">&nbsp;</div>
        <div class="one-third column">
            <ul class="pagination">
                    <li v-if="pagination.current_page > 1" >
                        <a  href="#" @click.prevent="changePage(pagination.current_page - 1)">
                            Atras
                        </a>
                    </li>

                    <li class='page-item' v-for="page in pagesNumber">
                        <a  href="#" @click.prevent="changePage(page)"  v-bind:class="[ page == isActived ? 'active' : '']">
                            @{{ page }}
                        </a>
                    </li>

                    <li v-if="pagination.current_page < pagination.last_page">
                        <a  href="#" @click.prevent="changePage(pagination.current_page + 1)">
                            Siguiente
                        </a>
                    </li>

              </ul>
        </div>
    </div>
    <div class="one-third column">&nbsp;</div>
<!-- Trigger/Open The Modal -->


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content container">
    <div class="modal-header">
        <h2>@{{fillPizza.name_pizza}}</h2>

    </div>
    <div class="modal-body ">
    <div>
        <div class="row">
            <div class="five columns">
                <img v-bind:src="fillPizza.img | toTable " class=" u-full-width">
            </div>
            <div class="seven columns">
                <h4 v-if='fillPizza.ingredients.length>0'>Ingredientes</h4>
                <h4 v-else>Personalizar su pizza</h4>

                <div class="flex-info-ingredient" v-if='fillPizza.ingredients.length>0'>
                    <div   v-for='ingredient in fillPizza.ingredients'>

                        <img v-bind:src="ingredient.img | toModal" class="rounded-img">

                        <p>@{{ingredient.name_ingredient}}</p>
                    </div>

                </div>
                <h4 v-if="fillPizza.extraIngredients.length>0">Ingredientes Extra Agregados</h4>
                <div class="flex-info-ingredient">
                    <div v-for="extra in fillPizza.extraIngredients">
                        <img v-bind:src="extra.img | toModal" class="rounded-img">
                    <p>@{{extra.name_ingredient}} $@{{extra.price}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="five columns">
                <h4>$ @{{ totalSum(fillPizza.extraIngredients,fillPizza.price) }}</h4>
                <h4 style="text-align: center; position:relative; top:0.7em">Agregar ingredientes: </h4>
            </div>

            <div class="seven columns">
                <multiselect
                :custom-label="customLabel"
                :class="[ errors.ingredients ? 'is-invalid' : '']"
                v-model="fillPizza.extraIngredients"
                :options="extraIngredientsAvaible"
                track-by="name_ingredient" label="name_ingredient"
                :multiple="true">

                </multiselect>
            </div>
        </div>

    </div>

    </div>
    <div class="modal-footer">
        <a href="#" class=" button button-custom input agregar-carrito" data-id="1" v-on:click.prevent="addIngredientesExtras" >Agregar Al Carrito</a>
        <a class=" button button-custom-agregar input" data-id="1" v-on:click.prevent="closeModal">Cerrar</a>

    </div>
  </div>

</div>



   </div>
   </div>


</div>
    <script src="{{ asset('clientes/js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
    <script src="https://unpkg.com/axios@0.19.0/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/custom/pedidos/order.js') }}"></script>

</body>
</html>
