@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>{{ $action }} Cliente</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="clientes">Clientes</a></li>
            <li class="breadcrumb-item active">Crear Cliente</li>

          </ol>

        </div>

      </div>

    </div>

  </section>

  <section class="content">

    <div class="card">

      <form action="{{route('client.save',$client)}}" method="post">

      	{{ csrf_field() }}

        <div class="card-body">

          <div class="row">

            <div class="col-md-6">

              <label class="label-style" for="name">Nombre</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('name')"><i class="fas fa-user"></i></span>

                  </div>

                  <input type="text" id="name" name="name" placeholder="Nombres y Apellido" class="form-control form-control-lg capitalize" required value="{{$client->name}}">
                  <input type="hidden" name="tipo" value="0">

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="lastname">Apellido</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('lastname')"><i class="fas fa-user"></i></span>

                  </div>

                  <input type="text" id="lastname" name="lastname" placeholder="Apellido" class="form-control form-control-lg" required value="{{$client->lastname}}">

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="Age">Edad</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('Age')"><i class="fas fa-user"></i></span>

                  </div>

                  <input type="number" min="18" max="99" id="age" name="age" placeholder="Edad" class="form-control form-control-lg" required value="{{$client->age}}">

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="gender">Genero</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('gender')"><i class="fas fa-user"></i></span>

                  </div>

                  <select id="gender" name="gender" class="form-control form-control-lg" required>
                    @if(!$client->id)
                      <option value="">-- Seleccione el genero --</option>
                    @else
                      <option value="{{$client->gender}}">{{$client->gender}}</option>
                    @endif
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                  </select>
              </div>

            </div>

          </div>

        </div>

        <div class="card-footer"> 

          <div class="row">

            <div class="col-md-6">

            <a href="{{route('appointment')}}" class="btn btn-block btn-danger float-left cancelar">
                <i class="fa fa-fw fa-minus"></i> Cancelar
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

@stop