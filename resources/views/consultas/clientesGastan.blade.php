@extends('layouts.template_home')

@section('titulo')
Clientes Frecuentes que mas Gastan
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Listado de los 5 Clientes que Mas Gastan</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Clientes Que más Gastan</a></li>
@endsection

@section('content')
    <div class="clearfix">
    <div class="col-md-12" >
        <div class="tile"  id="crud" v-cloak>
            <div class="table-responsive" >
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad de Ordenes</th>
                            <th>Compra Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->users->name }}</td>
                            <td>$ {{ $order->total}}</td>
                            <td>{{ $order->cantidad}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>



@endsection

@section('custom_javas')
@endsection
