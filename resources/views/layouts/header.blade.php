<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">PLan Ok</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ setActive('usuarios') }}" aria-current="page" href="{{ route('usuarios') }}">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ setActive('cotizaciones') }}" href="{{ route('cotizaciones') }}">Cotización</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ setActive('clientes') }}" href="{{ route('clientes') }}">Cliente</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ setActive('productos') }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Producto
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ setActive('productos') }}" href="{{ route('productos') }}">Listar Producto</a></li>
                            <li><a class="dropdown-item {{ setActive('cantProductos') }}" href="{{ route('cantProductos') }}">Cantidad Producto</a></li>
                            <li><a class="dropdown-item {{ setActive('ventasRealziadas') }}" href="{{ route('ventasRealziadas') }}">Ventas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
