<nav class="main-header navbar navbar-expand navbar-white navbar-light" role = "navigation">

  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <div class="navbar-custom-menu ml-auto">

    <ul class="nav navbar-nav">

      <li class="dropdown user user-menu generic">

        <a href="#" class = "dropdown-toggle" data-toggle="dropdown"> 

            <img src="{{ asset('img/usuarios/default/anonymous.png') }}" class="user-image">                       
            <span class = "hidden-xs">{{ Auth::user()->name }}</span>

        </a>

        <ul class="dropdown-menu">
    
          <li class="user-body">

            <div class = "pull-right">
              
              <a href="/logout" class="btn btn-default btn-flat">salir</a>
              
            </div>

          </li>

        </ul>
            
      </li>
               
    </ul>

  </div>

</nav>