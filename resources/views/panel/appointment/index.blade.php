@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Citas</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <a href="{{route('appointment.add')}}" class="btn btn-block btn-primary"><i class="fa fa-fw fa-plus"></i>Agendar cita</a>

          </ol>

        </div>

      </div>

    </div>

  </section>

  <section class="content">

    <div class="card">

      <div class="card-body">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

        <table class="table table-bordered table-striped dt-responsive table-hover tableAppointment">

          <thead>

            <tr>
              <th style="width: 10px">#</th>
              <th>Codigo</th>
              <th>Cliente</th>
              <th>Examen</th>
              <th>Tipo</th>
              <th>Fecha</th>
              <th>Fase</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>

          </thead>

        </table>

      </div>

    </div>

  </section>

</div>

<script src="{{ asset('js/appointment.js')}}"></script>
@stop