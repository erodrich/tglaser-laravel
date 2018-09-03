<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('home')}}">
            <span data-feather="home"></span>
            Inicio <span class="sr-only">(current)</span>
          </a>
        </li>
        @if (Request::url() != "/")

        <li class="nav-item">
          <a class="nav-link" href="{{ route('clients.index')}}">
              <span data-feather="users"></span>
              Clientes
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('suppliers.index')}}">
                <span data-feather="shopping-cart"></span>
                Proveedores
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.index')}}">
              <span data-feather="package"></span>
              Productos
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('warehouses.index')}}">
                <span data-feather="truck"></span>
                Almacén
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reportes
            </a>
        </li>
        @endif
        
      </ul>

    </div>
  </nav>