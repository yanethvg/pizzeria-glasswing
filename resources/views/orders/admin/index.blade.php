@extends('layouts.template_home')

@section('titulo')
Listado de Ordenes
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Listado de Ordenes</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Ordenes</a></li>
@endsection

@section('content')
    <div class="clearfix">
    <div class="col-md-12" >
        <div class="tile"  id="mispedidos" v-cloak>
            <div class="table-responsive" >
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Nombre de Usuario</th>
                            <th>Precio</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="order in orders">
                            <td>
                                @{{order.users.name}}
                            </td>
                            <td> $ @{{ order.amount }}</td>
                            <td> @{{ order.created_at }}</td>

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
        </div>

    </div>
</div>



@endsection

@section('custom_javas')
<script src="{{ asset('js/custom/pedidos/orderAdmin.js') }}" ></script>
@endsection
