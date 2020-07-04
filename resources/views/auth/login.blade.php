@extends('plantilla')

@section('content')

<div id="back"></div>

<div class="login-log style-logo">
    <a href="#" style="color: white !important">
        <img id="Image-login" src="{{ asset('mpdf/resultados/example.png') }}" style="width: 90%">
    </a>
</div>

<div class="login-box login-margin">

    <!-- /.login-logo -->
    <div class="login-box">

        <div id="backCard">

            <h1>Iniciar sesión<h1>

                    <form action="" method="post">

                        {{ csrf_field() }}

                        <div class="input-group mb-3">

                            <p>Usuario</p>
                            <input type="text" name="username" placeholder="Ingresa Usuario" />

                        </div>

                        <div class="input-group mb-3">

                            <p>Contraseña</p>
                            <input type="password" name="password" placeholder="Ingresa Contraseña" />

                        </div>

                        <div>
                            <div>
                                <button type="submit"
                                    class="btn btn-primary btn-block btn-flat login-button">Ingresar</button>
                            </div>
                        </div>

                        <?php 
          if (isset($mensaje_error))
          {
              echo '<br><div class=" alert alert-danger">Contraseña y/o usuario incorrectos</div>';
          }
        ?>
                    </form>

        </div>

    </div>

</div>

@stop