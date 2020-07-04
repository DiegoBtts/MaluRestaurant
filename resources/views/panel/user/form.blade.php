@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>{{ $user->id? 'Editar':'Nuevo' }} Usuario</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="user">Usuarios</a></li>
            <li class="breadcrumb-item active">Crear Usuario</li>

          </ol>

        </div>

      </div>

    </div>

  </section>

  <section class="content">

    <div class="card">

      <form action="{{route('user.save',$user)}}" method="post" enctype="multipart/form-data">

      	{{ csrf_field() }}

        <div class="card-body">

          <div class="row">

            <div class="col-md-6">

              <label class="label-style" for="name">Nombre</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('name')"><i class="fas fa-user"></i></span>

                  </div>

                  <input type="text" id="name" name="name" placeholder="Nombres y Apellido" class="form-control form-control-lg capitalize" required value="{{$user->name}}">

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="username">Usuario</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('username')"><i class="fas fa-user"></i></span>

                  </div>

                  @if($user->id)
                  <input type="text" id="username" name="username" placeholder="Usuario" class="form-control form-control-lg" required value="{{$user->username}}" readonly>
                  @else
                  <input type="text" id="username" name="username" placeholder="Usuario" class="form-control form-control-lg" required value="{{$user->username}}">
                  @endif

                  

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="password">Contraseña</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('')"><i class="fas fa-user"></i></span>

                  </div>

                  @if($user->id)
                    <input type="password" id="newPassword" placeholder="Contraseña (opcional)" class="form-control form-control-lg">
                    <input type="hidden" id="oldPassword" name="password" value="{{$user->password}}">
                    <input type="hidden" id="flag" name="flag" value="0">
                  @else
                    <input type="password" id="password" name="password" placeholder="Contraseña" class="form-control form-control-lg" required value="{{$user->password}}">
                    <input type="hidden" id="flag" name="flag" value="2">
                  @endif

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="role">Perfil</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('role')"><i class="fas fa-user"></i></span>

                  </div>

                  <select id="role" name="role"  class="form-control form-control-lg" required>

                    @if(!$user->id)

                      <option value="">-- Seleccione el tipo --</option>

                    @else

                      <option value="{{$user->role}}">{{ $user->role }}</option>
                    
                    @endif

                    <option value="admin">Administrador</option>
                    <option value="secretario">Secretario</option>

                  </select>

              </div>

            </div>

            <div class="col-md-6">

               <div class="form-group">

                <div class="panel">SUBIR FOTO</div>

                <input type="file" class="newPicture" name="newPicture">

                <p class="help-block">Peso máximo de la foto 2MB</p>

                @if(!$user->id)

                <img src="{{asset('img/usuarios/default/anonymous.png')}}" class="img-thumbnail preview" width="100px">

                @else

                <img src="{{asset($user->photo)}}" class="img-thumbnail preview" width="100px">
                
                @endif

              </div>

            </div>

          </div>

        </div>

        <div class="card-footer">

          <div class="row">

            <div class="col-md-6">

              <a href="{{route('user')}}" class="btn btn-block btn-danger float-left cancelar">
                <i class="fa fa-fw fa-plus"></i> Cancelar
              </a>

            </div>

            <div class="col-md-6">

              <button type="submit" class="btn btn-block btn-success float-right">
                <i class="fa fa-fw fa-plus"></i> Guardar
              </button>

            </div>

          </div>

        </div>

      </form>

    </div>

  </section>

</div>

<script src="{{ asset('js/user.js')}}"></script>

@stop