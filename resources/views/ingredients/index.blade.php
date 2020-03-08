@extends('layouts.template_home')

@section('titulo')
Listado de Ingredientes
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Listado de Ingredientes</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Ingredientes</a></li>
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
                            <th>Nombre del Ingrediente</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="ingredient in ingredients">
                            <td>@{{ ingredient.name_ingredient }}</td>
                            <td> $ @{{ ingredient.price }}</td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-outline-info mr-2" v-on:click.prevent="showIngredient(ingredient)"><i class="fa fa-pencil icon-expe"></i></a>
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

            @include('ingredients.partials.create')
            @include('ingredients.partials.edit')

        </div>

    </div>
</div>



@endsection

@section('custom_javas')
<script src="{{ asset('js/custom/ingredient/crud.js') }}" ></script>
@endsection
