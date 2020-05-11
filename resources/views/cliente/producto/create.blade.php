@extends('layouts.app')

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection

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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Productos') }}</li>
                </ol>
            </nav>
        </div>
        @php
            $number = 0;
        @endphp
         <!-- Modal Subir Foto -->
         <div class="modal fade" id="SubirFoto" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sube Imagenes de tus Productos Automáticamente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body m-3">
                    @if(session('notification'))
                        @php
                            $number = intval(preg_replace('/[^0-9]+/', '', session('notification')), 10); 
                        @endphp
                        <form id="dropzoneFrom" method="post" action="{{ url('producto/dropzoneFrom')}}" 
                            class="dropzone" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="puesto" value="{{ $usuarioPuesto->puesto_id }}">
                            <input type="hidden" name="producto" value="{{ $number }}">   
                        </form>
                    @else
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <div class="alert-message">
                            <strong>Primero Registre su Producto!</strong>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
         <!-- End Modal Subir Foto -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0">{{ __('Registrar Producto') }}</h5>
                            </div>
                            <div class="col text-right">
                                <a href="{{ url('/producto/'.$usuarioPuesto->id.'/grupo') }}" class="btn btn-secondary mt-2">Registrar Grupo</a>
                                <a href="#"><button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#SubirFoto">
                                    Subir Foto Producto
                                </button></a>
                                <a href="{{ url('producto/create') }}"><button type="button" class="btn btn-info mt-2" >
                                    Ver Producto
                                </button></a>
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
                        <form action="{{ url('producto/store/') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">Nombre del Producto</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="precio">Precio del Producto</label>
                                <input type="number" class="form-control" name="precio" value="{{ old('precio') }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                               <label class="form-label">Seleccione su Subcategoria</label>
                               <div class="mb-3">
								<select class="form-control select2" id="subcategoria" name="subcategoria" data-toggle="select2">
                                    <optgroup label="Subcategorias Disponibles">
                                    <option value=""></option>
                                    @foreach($puestoSubcategorias as $puestosub)
                                        <option value="{{ $puestosub->id }}">{{ $puestosub->subcategorias->name }}</option>
                                    @endforeach
                                    </optgroup>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                               <label class="form-label">Seleccione su Grupo</label>
                               <div class="mb-3">
								<select class="form-control select2" id="grupo" name="grupo" data-toggle="select2">
                                    <optgroup label="Grupos Disponibles">
                                    <option value=""></option>
                                    @foreach($grupos as $grupo)
                                        <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                                    @endforeach
                                    </optgroup>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="stock">Stock del Producto</label>
                                <input type="number" class="form-control" name="stock" value="{{ old('stock') }}">
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="description">Descripción del Producto</label>
                                <textarea name="description" data-provide="markdown" rows="14">{{ old('description') }}</textarea>
                            </div> 
                            <input type="hidden" name="puesto_id" value={{ $usuarioPuesto->id }}>
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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <script>
        $(function() {
            $subcategoria = $('#subcategoria');
            $grupo = $('#grupo');

            $subcategoria.change(() => {
                const subcategoriaId = $subcategoria.val();
                const url = `/grupos/${ subcategoriaId }/subcategorias`;
                $.getJSON(url, onGrupos);
            });

            function onGrupos(data) {
                let htmlOptions = '';
                data.forEach(grupos => {
                    htmlOptions += `<option value="${grupos.id}">${grupos.name}</option>`;
                });
                $grupo.html(htmlOptions);
            }

            function onProductos(data) {
                console.log(data);
            }
        });
        Dropzone.options.dropzoneFrom = { 
        // Change following configuration below as you need there bro
        autoProcessQueue: true,
        uploadMultiple: true,
        parallelUploads: 2,
        maxFiles: 10,
        maxFilesize: 5,
        addRemoveLinks: true,
        dictRemoveFile: "Eliminar",
        dictDefaultMessage: "<h3 class='sbold'>Suba las fotos del producto<h3>",
        acceptedFiles: 'image/*',
        //another of your configurations..and so on...and so on...
        init: function() {
            this.on("removedfile", function(file) {
                console.log(file.name);
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/producto/dropzonedelete') }}",
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        "name": file.name,
                        "producto": "<?php echo $number; ?>",
                        "puesto": "<?php echo $usuarioPuesto->puesto_id; ?>"
                    },
                    dataType: "json",
                    method: "POST",
                    success: function(response) {
                        //Acciones si success
                    },
                    error: function () {
                        //Acciones si error
                    }
                });
            });
        }}
    </script>
    
@endsection

