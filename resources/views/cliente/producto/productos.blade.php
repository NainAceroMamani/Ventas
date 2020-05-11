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
                <li class="breadcrumb-item"><a href="#">{{ __('Feria_Tacna') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Mis Productos') }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
        @foreach($productos as $producto)
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
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6 text-center mt-2">
                                <a href="{{ url('producto/'.$usuarioPuesto->id.'/editar/'.$producto->id) }}"><button type="button" class="btn btn-primary btn-block">
                                    Editar
                                </button></a>
                            </div>
                            <div class="col-md-6 text-center mt-2">
                                <a href="#"><button type="button" class="btn btn-danger btn-block">
                                    Eliminar
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
