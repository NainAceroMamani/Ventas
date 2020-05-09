<div class="wrapper">
    <nav id="sidebar" class="sidebar">
        <a class="sidebar-brand" href="index.html">
        <svg>
            <use xlink:href="#ion-ios-pulse-strong"></use>
        </svg>
            Feria Tacna
        </a>
        <div class="sidebar-content">
            <div class="sidebar-user">
                <img src="{{ asset('img/user.png') }}" class="img-fluid rounded-circle mb-2" alt="Linda Miller" />
                <div class="font-weight-bold">{{ auth()->user()->name }}</div>
                <small>{{ __('Feria Tacna') }}</small>
            </div>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Main
                </li>
                <li class="sidebar-item">
                    <a href="#dashboards" data-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboards</span>
                    </a>
                    <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item active"><a class="sidebar-link" href="{{ url('home') }}">{{ __('Inicio') }}</a></li>
                    </ul>
                </li>
                <li class="sidebar-item">
					<a class="sidebar-link" href="{{ url('user') }}">
                        <i class="align-middle mr-2 fas fa-fw fa-user-check"></i> <span class="align-middle">{{ __('Mis Datos') }}</span>
                        <span class="sidebar-badge badge badge-pill badge-primary">{{ __('Perfil') }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
					<a class="sidebar-link" href="{{ url('puesto') }}">
                        <i class="align-middle mr-2 fas fa-fw fa-store"></i> <span class="align-middle">{{ __('Mis Puestos') }}</span>
                        <span class="sidebar-badge badge badge-pill badge-primary">{{ auth()->user()->maxpuestos }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#productos" data-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">Productos</span>
                    </a>
                    <ul id="productos" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ url('producto') }}">{{ __('Lista de Productos') }}</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="#">{{ __('Crear de Producto') }}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>