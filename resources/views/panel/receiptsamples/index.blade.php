@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Recepción de Muestras</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <a href="{{route('receiptsamples.add')}}" class="btn btn-block btn-primary"><i class="fa fa-fw fa-plus"></i>Recibir muestra</a>

          </ol>

        </div>

      </div>

    </div>

  </section>

  <section class="content">

    <div class="card">

      <div class="card-body">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

        <table class="table table-bordered table-hover tableReceiptSamples">

          <thead>

            <tr>
              <th style="width: 10px">#</th>
              <th>Paciente</th>
              <th>Examen</th>
              <th>Muestra</th>
              <th>Fecha de recepcion</th>
              <th>Hora</th>
              <th>Codigo</th>
              <th>Acciones</th>
            </tr>

          </thead>

        </table>

      </div>

    </div>

  </section>

</div>

<script src="{{ asset('js/receiptsamples.js')}}"></script>

@stop