@extends('layouts.template_home')

@section('titulo')
Sucursales
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Sucursales</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Sucursales</a></li>
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
                            <th>Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sucursales as $sucursal)
                        <tr>
                            <td>{{ $sucursal->name }}</td>
                            <td>{{ $sucursal->address}}</td>
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
