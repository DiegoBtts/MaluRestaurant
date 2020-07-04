@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Examenes clinicos disponibles</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <a href="{{route('category.add')}}" class="btn btn-block btn-primary"><i class="fa fa-fw fa-plus"></i>Agregar nuevo</a>

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
            
            <tr>
              <td>1</td>
              <td>Nuevo</td>
              <td>
                <div class="btn-group">
                  <a href="" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                  <a href="" class="btn btn-danger"><i class="fa fa-times"></i></a>
                </div>
              </td>
              </tr>
            
          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

@stop