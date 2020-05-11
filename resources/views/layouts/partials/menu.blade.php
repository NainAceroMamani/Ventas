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
                    <a href="#puestos" data-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">{{ __('Mis Puestos') }}</span>
                    </a>
                    <ul id="puestos" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto') }}"">{{ __('Lista de Puestos') }}</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ url('puesto/create') }}"">{{ __('Crear de Puesto') }}</a></li>
                    </ul>
                </li>
                <li class="sidebar-item">
					<a class="sidebar-link" href="{{ url('producto/create') }}">
                        <i class="align-middle mr-2 fas fa-fw fa-list"></i> <span class="align-middle">{{ __('Lista de Productos') }}</span>
                        <span class="sidebar-badge badge badge-pill badge-primary">{{ __('Ir') }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
					<a class="sidebar-link" href="{{ url('price') }}">
                        <i class="align-middle mr-2 fas fa-fw fa-dollar-sign"></i> <span class="align-middle">{{ __('Sussripciones') }}</span>
                        <span class="sidebar-badge badge badge-pill badge-primary">{{ __('Ir') }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
					<a class="sidebar-link" href="javascript:void" onclick="$('#logout-form').submit();">
                        <i class="align-middle mr-2 fab fa-fw fa-expeditedssl"></i> <span class="align-middle">{{ __('Cerrar sesión') }}</span>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </nav>