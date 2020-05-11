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
                    <li class="breadcrumb-item"><a href="dashboard-default.html">{{ __('Feria_Tacna') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Grupos') }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0">{{ __('Registrar Grupo') }}</h5>
                            </div>
                            <div class="col text-right">
                                <a href="{{ url('/producto/create') }}" class="btn btn-pill btn-info">Volver y Cancelar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                                <strong>{{ $errors->first() }}</strong>
                            </div>
                        </div>
                        @endif
                        <form action="{{ url('producto/grupo/') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">Nombre del Grupo</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Seleccione las subcategorias</label>
                                <div class="mb-3">
								<select class="form-control select2" name="subcategoria_id" data-toggle="select2">
                                <optgroup label="Subcategorias Disponibles">
                                    @foreach($puestoSubcategorias as $subcategorias)
                                        <option value="{{ $subcategorias->id }}">{{ $subcategorias->subcategorias->name }}</option>
                                    @endforeach
                                </optgroup>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descripción</label>
                                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                            </div>
                            <input type="hidden" name="puesto_id" value="{{ $usuarioPuesto->id }}">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@include('layouts.partials.footer')
@endsection

