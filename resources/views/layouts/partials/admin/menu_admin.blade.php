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
        <a href="#categoria" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">{{ __('Categorias') }}</span>
        </a>
        <ul id="categoria" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('categoria') }}"">{{ __('Lista de Categorias') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('categoria/create') }}"">{{ __('Crear Categorias') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#subcategoria" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">{{ __('SubCategoria') }}</span>
        </a>
        <ul id="subcategoria" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('subcategoria') }}"">{{ __('Lista de SubCategoria') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('subcategoria/create') }}"">{{ __('Crear SubCategoria') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#paises" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">{{ __('Paises') }}</span>
        </a>
        <ul id="paises" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('pais') }}"">{{ __('Lista de Paises') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('pais/create') }}"">{{ __('Crear Pais') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#regiones" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">{{ __('Regiones') }}</span>
        </a>
        <ul id="regiones" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('region') }}"">{{ __('Lista de Regiones') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('region/create') }}"">{{ __('Crear Region') }}</a></li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="#provincias" data-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">{{ __('Provincias') }}</span>
        </a>
        <ul id="provincias" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('provincia') }}"">{{ __('Lista de Provincias') }}</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('provincia/create') }}"">{{ __('Crear Provincia') }}</a></li>
        </ul>
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