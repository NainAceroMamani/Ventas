@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <style>
    .swiper-button-prev,
    .swiper-button-next {
        display: none !important;
    }
    
    .swiper-container:hover .swiper-button-prev,
    .swiper-container:hover .swiper-button-next {
        display: flex !important;
    }
    </style>
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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Mis Productos') }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <!-- Formulario de Edit Producto -->
            <div class="col-xxl-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Editar Producto') }} {{ $producto->name }}</h5>
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
                        <form action="{{ url('producto/update/'.$producto->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="name">Nombre del Producto</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $producto->name) }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="precio">Precio del Producto</label>
                                <input type="number" class="form-control" name="precio" value="{{ old('precio', $producto->precio) }}" required>
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="stock">Stock del Producto</label>
                                <input type="number" class="form-control" name="stock" value="{{ old('stock', $producto->stock) }}">
                                <small class="form-text text-muted">{{ __('Campo Requerido.') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="description">Descripción del Producto</label>
                                <textarea name="description" data-provide="markdown" rows="14">{{ old('description', $producto->description) }}</textarea>
                            </div> 
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Formulario de Edit Producto -->
            
            <!-- Vista de Producto -->
            <div class="col-xxl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-sm-12 col-xl-12 col-xxl-12 text-center">
                            @if(count($producto->imagen_productos) > 0)
                            <div class="swiper-container">
                            <div class="swiper-wrapper">
                            @foreach($producto->imagen_productos as $imagenes)
                                <div class="swiper-slide">
                                    <a href="#">
                                        <img src="{{ asset('storage/'.$usuarioPuesto->puesto_id.'/'.$producto->id.'/'.$imagenes->imagen) }}" class="card-img-top mt-2" alt="Angelica Ramos">
                                    </a>
                                </div>
                            @endforeach
                            </div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                            @else
                                <img src="{{ asset('img/imagen.png') }}" class="card-img-top mt-2">
                            @endif
                            </div>
                        </div>
                        <br>
                        <table class="table table-sm my-2">
                            <tbody>
                                <tr>
                                    <th>Nombre</th>
                                    <td>{{ $producto->name }}</td>
                                </tr>
                                <tr>
                                    <th>Precio</th>
                                    <td>{{ $producto->precio }}</td>
                                </tr>
                                <tr>
                                    <th>Stock</th>
                                    <td>{{ $producto->stock }}</td>
                                </tr>
                                <tr>
                                    <th>Estado</th>
                                    @if($producto->activo)
                                        <td><span class="badge badge-success">Activado</span></td>
                                    @else
                                        <td><span class="badge badge-danger">Desactivado</span></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Vista de Producto -->
        </div>

    </div>
</main>
@include('layouts.partials.footer')
@endsection


@section('scripts')
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <script>
        var mySwiper = new Swiper ('.swiper-container', {
            // Optional parameters
            slidesPerView: 1,
            centeredSlides: true,
            spaceBetween: 30,
            loop: true,
            loopFillGroupWithBlank: true,

            autoplay: {
            delay: 4000,
            disableOnInteraction: false,
            },

            // Si se desea agregar la paginacion 
            // pagination: {
            // el: '.swiper-pagination',
            // clickable: true,
            // },

            // Navigation arrows
            navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
