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

            @if(auth()->user()->role == 'Cliente')
                @include('layouts.partials.cliente.menu_cliente')
            @elseif(auth()->user()->role == 'Admin')
                @include('layouts.partials.admin.menu_admin')
            @endif
        </div>
    </nav>