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
                <li class="breadcrumb-item active" aria-current="page">{{ __('Mis Puestos') }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-10 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach($usuarios_puestos as $usuarios_puesto)
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Puesto Nº {{ $usuarios_puesto->puesto_id }}</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="avatar">
                                                <div class="avatar-title rounded-circle bg-primary-dark">
                                                    <i class="align-middle" data-feather="users"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="display-5 mt-2 mb-4">{{ $usuarios_puesto->puesto->name }}</h1>
                                    <div class="mb-0">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> Creado </span> {{ $usuarios_puesto->puesto->created_at }}
                                
                                        <div class="col-sm-10 ml-sm-auto text-right mt-2">
                                            <a href="{{ url('producto/'.$usuarios_puesto->id.'/add') }}"><button type="submit" class="btn btn-primary">{{ __('Añadir Productos') }}</button></a>
                                            <a href="{{ url('producto/'.$usuarios_puesto->id.'/lista') }}"><button type="submit" class="btn btn-success">{{ __('Ver Productos') }}</button></a>
                                        </div>
                                    </div>
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
