@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Administrar Usuarios</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <a href="{{route('user.add')}}" class="btn btn-block btn-primary"><i class="fa fa-fw fa-plus"></i>Nuevo Usuario</a>

          </ol>

        </div>

      </div>

    </div>

  </section>

  <section class="content">

    <div class="card">

      <div class="card-body">

        <table class="table table-bordered table-hover tableUser">

          <thead>

            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Perfil</th>
              <th>Ultimo Login</th>
              <th>Foto</th>
              <th>Acciones</th>
            </tr>

          </thead>

          <tbody>
            
            @foreach($items as $key => $value)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->username}}</td>
              <td>{{$value->role}}</td>
              <td>{{$value->last_login}}</td>
              <td><img src="{{$value->photo}}" alt=""></td>
              <td>
                <div class="btn-group">
                  <a href="{{route('user.edit',$value->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                  <button id="delete" UserId = "{{$value->id}}" class="btn btn-danger"><i class="fa fa-times"></i></button>
                </div>
              </td>
              </tr>
            @endforeach
            
          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<script src="{{ asset('js/user.js')}}"></script>

@stop