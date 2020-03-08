@extends('layouts.template_auth')

@section('content')
<div class="logo">
    <h1>Glasswing</h1>
</div>
<div class="login-box">
    <form method="POST" action="{{ route('login') }}" class="login-form" >
        @csrf
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar Sesión</h3>
        <div class="form-group">
            <label class="control-label">{{ __('Correo Electronico') }}</label>
            <input class="form-control @if($errors->has('email')) is-invalid @endif"
                name="email" value="{{ old('email')}} " required autofocus placeholder="Ingrese Correo Electronico">

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>
        <div class="form-group">
            <label class="control-label">{{ __('Contraseña') }}</label>
            <input id="password" type="password" class="form-control @if($errors->has('password')) is-invalid @endif"
                name="password" required autocomplete="current-password" placeholder="Ingrese Contraseña">

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i
                    class="fa fa-sign-in fa-lg fa-fw"></i>{{ __('Ingresar') }}</button>
        </div>

    </form>

</div>
@endsection
