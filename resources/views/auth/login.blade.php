@extends('plantilla')
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="..\css\iconic\css\material-design-iconic-font.min.css" />
<link rel="stylesheet" type="text/css" href="..\css\util.css" />
<link rel="stylesheet" type="text/css" href="..\css\main.css" />
<!--===============================================================================================-->
@section('content')

<div class="limiter">
    <div class="container-login100" style="background-image: url(../img/plantilla/bg-01.jpg)">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

            <span class="login100-form-title p-b-49"> Restaurante Malu </span>
            <form action="" method="post" class="login100-form validate-form">

                {{ csrf_field() }}
                <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                    <span class="label-input100">Usuario</span>
                    <input class="input100" type="text" name="username" placeholder="Ingresa Usuario" />
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Ingresa Contraseña" />
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="text-right p-t-8 p-b-31">
                    <a href="#"> Forgot password? </a>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">Ingresar</button>
                    </div>
                </div>

                <div class="flex-col-c p-t-155">
                    <span class="txt1 p-b-17"> </span>
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

<div id="dropDownSelect1"></div>

@stop