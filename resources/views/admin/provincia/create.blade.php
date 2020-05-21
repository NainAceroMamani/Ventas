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
                <li class="breadcrumb-item active" aria-current="page">{{ __('Provincias') }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <!-- Formulario de Usuario -->
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Crear Provincia') }}</h5>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="alert-message">
                                <strong>{{ $errors->first() }}</strong>
                            </div>
                        </div>
                        @endif
                        @if (session('notification'))
                        <div class="alert alert-primary alert-dismissible" role="alert">
                            <div class="alert-icon">
                                <i class="far fa-fw fa-bell"></i>
                            </div>
                            <div class="alert-message">
                                <strong>{{ session('notification') }}</strong>
                            </div>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
						</div>
                        @endif
                        <form action="{{ url('provincia/store/') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">Nombre de la Provincia</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                               <label class="form-label">Seleccione el Pais</label>
                               <div class="mb-3">
								<select class="form-control select2" id="pais_id" name="pais_id" data-toggle="select2">
                                    <optgroup label="Paises Disponibles">
                                    <option value=""></option>
                                    @foreach($paises as $pais)
                                        <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                    @endforeach
                                    </optgroup>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                               <label class="form-label">Seleccione la Region</label>
                               <div class="mb-3">
								<select class="form-control select1" id="region_id" name="region_id" data-toggle="select1">
                                    <optgroup label="Regiones Disponibles">
                                    @foreach($regiones as $region)
                                        <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                    @endforeach
                                    </optgroup>
                                </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Formulario de Usuario -->
        </div>
    </div>
</main>

@include('layouts.partials.footer')
@endsection

@section('scripts')
<script>
    $(function() {
        $(".select1").each(function() {
            $(this)
                .wrap("<div class=\"position-relative\"></div>")
                .select2({
                    placeholder: "Select value",
                    dropdownParent: $(this).parent()
                });
        })
    });
    $pais = $('#pais_id');
    $region = $('#region_id');

    $pais.change(() => {
        const pais_id = $pais.val();
        const url = `/region/${pais_id}/regiones`;
        $.getJSON(url, onRegiones);
    });

    function onRegiones(data) {
        let htmlOptions = '';
        data.forEach(regiones => {
            htmlOptions += `<option value="${regiones.id}">${regiones.nombre}</option>`;
        });
        $region.html(htmlOptions);
    }
</script>
@endsection
