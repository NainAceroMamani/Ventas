@extends('layouts.app')

@section('content')
<main class="main h-200 w-100">
    <div class="container h-200">
        <div class="row h-200">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-200">
            <div class="d-table-cell align-middle">

            <div class="text-center mt-4">
                <h1 class="h2">{{ __('REGISTRE SU TIENDA') }}</h1>
                <p class="lead">
                {{ __('Su tienda en linea ya está casi lista') }}
                </p>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="m-sm-4">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <div class="alert-message">
                            <strong>{{ $errors->first() }}</strong>
                        </div>
                    </div>
                    @endif
                        <div class="text-center mt-3">    
                            <a href="" class="btn btn-facebook btn-lg">
                                {{ __("Facebook") }} <i class="align-middle mr-2 fab fa-fw fa-facebook"></i>
                            </a>
                            <a href="" class="btn btn-google btn-lg">
                                {{ __("Google") }} <i class="fa fa-google"></i>
                            </a>
                            <a href="" class="btn btn-twitter btn-lg">
                                {{ __("Twitter") }} <i class="fa fa-twitter"></i>
                            </a>
                            <a href=""
                                class="btn btn-github btn-lg">
                                {{ __("Github") }} <i class="fa fa-github" ></i>
                            </a>
                        </div>
                        <hr>
                        <form role="form" method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="form-group">
                                <label>{{ __('¿Cuál es el nombre de su tienda?') }}</label>
                                <input class="form-control form-control-lg" type="text" name="name" value="{{ old('name') }}" required />
                                <small class="form-text text-muted">{{ __('Introduzca el nombre de la tienda como quiere que aparezca para sus clientes.') }}</small>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Correo Electrónico') }}</label>
                                <input class="form-control form-control-lg" type="email" name="email" value="{{ old('email') }}" required />
                                <small class="form-text text-muted">{{ __('Con este correo podrá iniciar sesión.') }}</small>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Contraseña') }}</label>
                                <input class="form-control form-control-lg" type="password" name="password" />
                                <small class="form-text text-muted">{{ __('Su contraseña es personal.') }}</small>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-lg btn-primary">{{ __('Registrarse') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</main>
@endsection
