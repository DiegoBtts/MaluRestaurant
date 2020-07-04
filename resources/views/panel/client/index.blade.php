@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Cartera de clientes</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <a href="{{route('client.add')}}" class="btn btn-block btn-primary"><i class="fa fa-fw fa-plus"></i>Cliente nuevo</a>

          </ol>

        </div>

      </div>

    </div>

  </section>

  <section class="content">

    <div class="card">

      <div class="card-body">

        <table class="table table-bordered table-hover tableClient">

          <thead>

            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Edad</th>
              <th>Genero</th>
              <th>Acciones</th>
            </tr>

          </thead>

          <tbody>
            
            @foreach($items as $key => $value)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->lastname}}</td>
              <td>{{$value->age}}</td>
              <td>{{$value->gender}}</td>
              <td>
                <div class="btn-group">
                  <a href="{{route('client.edit',$value->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                  <button id="delete" ClientId = "{{$value->id}}" class="btn btn-danger"><i class="fa fa-times"></i></button>
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

<script src="{{ asset('js/client.js')}}"></script>

@stop