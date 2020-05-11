@extends('layouts.app')

@section('content')
@include('layouts.partials.menu')
@include('layouts.partials.navbar')

<main class="content">
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">
                {{ __('Panel de Administración') }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ __('Feria_Tacna') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Mis Productos') }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-10 d-flex">
                <div class="w-100">
                <div class="row">
                <div class="col-sm-12">
                    @foreach($puestoSubcategorias as $puestoSubcategoria)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Categoria {{ $puestoSubcategoria->subcategorias->name }} </h5>
                                </div>
                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @foreach($puestoSubcategoria->grupos as $grupos)
                        <div class="card shadow-sm bg-white">
                            <div class="card-body">
                                <div class="col mt-0">
                                    <h5 class="card-title">Grupo {{ $grupos->name }} </h5>
                                    <div class="row align-items-center">
                                    <div class="col text-right">
                                        <a href="{{ url('productos/'.$grupos->id.'/all/'.$usuarioPuesto->id) }}"><button type="button" class="btn btn-info">
                                            Ver Productos
                                        </button></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layouts.partials.footer')
@endsection
