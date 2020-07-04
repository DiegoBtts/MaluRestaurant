@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Cartera de Categoria</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <a href="{{route('category.add')}}" class="btn btn-block btn-primary"><i class="fa fa-fw fa-plus"></i>Agregar Categoria</a>

          </ol>

        </div>

      </div>

    </div>

  </section>

  <section class="content">

    <div class="card">

      <div class="card-body">

        <table class="table table-bordered table-hover tableCategory">

          <thead>

            <tr>
              <th style="width: 10px">#</th>
              <th>Categoria</th>
              <th>Acciones</th>
            </tr>

          </thead>

          <tbody>
            
            @foreach($items as $key => $value)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$value->name}}</td>
              <td>
                <div class="btn-group">
                  <a href="{{route('category.edit',$value->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                  <button id="delete" CategoryId = "{{$value->id}}" class="btn btn-danger"><i class="fa fa-times"></i></button>
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

<script src="{{ asset('js/category.js')}}"></script>

@stop