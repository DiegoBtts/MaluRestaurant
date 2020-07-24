<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="/" class="brand-link">

        <img src="{{ asset('img/plantilla/LogoMalu.png') }}" alt="" class="brand-image img-circle elevation-3"
            style="opacity: .8">

        <span class="brand-text font-weight-light">Malu Restaurante</span>

    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/usuarios/default/anonymous.png') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Ventas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sell') }}" class="nav-link">
                                <i class="nav-icon fas fa-cash-register"></i>
                                <p>Ventas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('saleshistory') }}" class="nav-link">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>Corte fin día</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('product')}}" class="nav-link">
                        <i class="nav-icon fas fa-concierge-bell"></i>
                        <p>
                            Menú
                            <span class="right badge badge-danger">new</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('orderfood')}}" class="nav-link">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>
                            Comandas
                            <span class="right badge badge-danger">new</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('product')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Facturación
                            <span class="right badge badge-danger">new</span>
                        </p>
                    </a>
                </li>


                @if(Auth::user()->role=="admin")

                <li class="nav-item">
                    <a href="{{ route('user') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Usuarios
                            <span class="right badge badge-danger">new</span>
                        </p>
                    </a>
                </li>

                @endif

            </ul>

        </nav>

    </div>

</aside>