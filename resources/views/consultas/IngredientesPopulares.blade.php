@extends('layouts.template_home')

@section('titulo')
Ingredientes Populares
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Listado de los 5 Ingredientes Populares</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Ingredientes Populares</a></li>
@endsection

@section('content')
    <div class="clearfix">
    <div class="col-md-12" >
        <div class="tile"  id="crud" v-cloak>
            <div class="table-responsive" >
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Cantidad Pedidas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailsIngredient as $detail)
                        <tr>
                            <td>
                                @if($detail->ingredient->img)
                                    <img src="{{str_replace('upload/','upload/w_80,h_80,c_scale/',$detail->ingredient->img)}}" alt="">
                                @else
                                <img src="https://res.cloudinary.com/dgi2nmgsy/image/upload/w_80,h_80,c_scale/v1583768036/d43c12cc0053b2636250ba55d5c9d805_th9kkn.jpg" alt="">
                                @endif
                            </td>
                            <td>{{ $detail->ingredient->name_ingredient }}</td>
                            <td>{{ $detail->cantidad}}</td>
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
