<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <a href="inicio" class="brand-link">

    <img src="{{ asset('img/plantilla/logo-blanco-lineal.png') }}" alt="" class="brand-image img-circle elevation-3"
         style="opacity: .8">

    <span class="brand-text font-weight-light">SynLab</span>

  </a>

    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="crearventa" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                <span class="right badge badge-danger">Building</span>
              </p>
            </a>
          </li>

        </ul>

      </nav>

    </div>

  </aside>