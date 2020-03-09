@extends('layouts.template_home')

@section('titulo')
Listado de Pizzas
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Listado de Pizzas</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Pizzas</a></li>
@endsection

@section('content')
    <div class="clearfix">
    <div class="col-md-12" >
        <div class="tile"  id="crud" v-cloak>
            <div class="d-flex mb-2">
                <div class="float-right ml-auto">
                    <a class="btn btn-outline-success"  v-on:click.prevent="showCreate" href=""><i
                            class="fa fa-user-plus icon-expe"></i>Registrar</a>
                </div>
            </div>
            <div class="table-responsive" >
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre </th>
                            <th>Precio</th>
                            <th>Lista de Ingredientes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="pizza in pizzas">
                            <td>
                                <img v-bind:src="pizza.img | toTable" alt="">
                            </td>
                            <td>@{{ pizza.name_pizza }}</td>
                            <td> $ @{{ pizza.price }}</td>
                            <td style="flex-wrap: wrap;width:35%">
                                <h5><span class="badge badge-pill badge-info"  v-for="ingredient in pizza.ingredients"> @{{ ingredient.name_ingredient}}</span></h5>&nbsp;
                            </td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-outline-info mr-2" v-on:click.prevent="showPizza(pizza)"><i class="fa fa-pencil icon-expe"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav>
                <ul class="pagination d-flex justify-content-center">
                    <li v-if="pagination.current_page > 1" class="page-item" >
                        <a class='page-link' href="#" @click.prevent="changePage(pagination.current_page - 1)">
                            <span>Atras</span>
                        </a>
                    </li>

                    <li class='page-item' v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                        <a  class='page-link' href="#" @click.prevent="changePage(page)">
                            @{{ page }}
                        </a>
                    </li>

                    <li v-if="pagination.current_page < pagination.last_page">
                        <a class='page-link' href="#" @click.prevent="changePage(pagination.current_page + 1)">
                            <span>Siguiente</span>
                        </a>
                    </li>
                </ul>
            </nav>
            @include('pizzas.partials.create')
            @include('pizzas.partials.edit')
        </div>

    </div>
</div>



@endsection

@section('custom_javas')
<script src="{{ asset('js/custom/pizza/crud.js') }}" ></script>
@endsection
