@extends('layouts.template_home')

@section('titulo')
Home Glasswing
@endsection

@section('title_content')
<h1><i class="fa fa-dashboard"></i>Home</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="alert alert-info">
    <strong>Bienvenido al Sistema de Pizzeria </strong>Indicaciones para {{ Auth::user()->username }}
</div>
<div class="tile">
    <div class="tile-body">
           Hola
    </div>
</div>
@endsection
