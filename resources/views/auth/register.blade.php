@extends('layouts.template_auth')

@section('content')
<div class="logo">
    <h1>Glasswing</h1>
</div>
<div class="login-box">
    <form method="POST" action="{{ route('register') }}" class="login-form" aria-label="{{ __('Register') }}">
        @csrf
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Registrate</h3>
        <div class="form-group">
            <label class="control-label">{{ __('Nombre') }}</label>
            <input class="form-control @if($errors->has('name')) is-invalid @endif"
                name="name" value="{{ old('name')}} " required placeholder="Ingrese su Nombre">

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

        </div>
        <div class="form-group">
            <label class="control-label">{{ __('Username') }}</label>
            <input class="form-control @if($errors->has('username')) is-invalid @endif"
                name="username" value="{{ old('username')}} " required  placeholder="Ingrese su Username">

            @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif

        </div>
        <div class="form-group">
            <label class="control-label">{{ __('Correo Electronico') }}</label>
            <input class="form-control @if($errors->has('email')) is-invalid @endif"
                name="email" value="{{ old('email')}} " required placeholder="Ingrese Correo Electronico">

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>
        <div class="form-group">
            <label class="control-label">{{ __('Contraseña') }}</label>
            <input id="password" type="password" class="form-control @if($errors->has('password')) is-invalid @endif"
                name="password" required placeholder="Ingrese Contraseña">

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="control-label">{{ __('Contraseña') }}</label>
            <input id="password_confirmation" type="password" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif"
                name="password_confirmation" required placeholder="Ingrese Contraseña Nuevamente">


        </div>
        <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i
                    class="fa fa-sign-in fa-lg fa-fw"></i>{{ __('Registrar') }}</button>
        </div>

    </form>

</div>
@endsection
