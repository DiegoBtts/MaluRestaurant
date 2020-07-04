@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Historial de Ventas</h1>

        </div>

      </div>

    </div>

  </section>

  <section class="content">

    <div class="card">

      <div class="card-body">

        <table class="table table-bordered table-hover tableSales">

          <thead>

            <tr>
              <th style="width: 10px">#</th>
              <th>metodo de pago</th>
              <th>lista de cita</th>
              <th>total</th>
              <th>fecha</th>
              <th>Acciones</th>
            </tr>

          </thead>

          <tbody>
            
            @foreach($items as $key => $value)
            <tr>
              <td>{{(count($items)-($key+1)+1)}}</td>
              <td>{{$value->payment_method}}</td>
              <td>
                <button class="btn btn-success details" saleId="{{$value->id}}" data-toggle="modal" data-target="#modalDetails">Más detalles</button>
              </td>
              <td>{{$value->total}}</td>
              <td>{{$value->created_at->format("d/m/Y")}}</td>
              
              <td>
                <div class="btn-group">
                  <button saleId = "{{$value->id}}" class="btn btn-primary print"><i class="fa fa-barcode"></i></button>
                  <button id="delete" SalesHistoryId = "{{$value->id}}" class="btn btn-danger"><i class="fa fa-times"></i></button>
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

<div class="modal fade" id="modalDetails">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <div class="modal-header">

          <h4 class="modal-title">Detalles de cita</h4>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>

        </div>
          
        <input type="hidden" value="{{ csrf_token() }}" id="token">

        <div class="modal-body">

          <div class="row">
              
              <div class="col-md-12">

                <table class="table tableDetails">

                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Cliente</th>
                      <th>Precio</th>
                    </tr>
                  </thead>

                  <tbody id="content_table_details">        
                    
                  </tbody>

                </table>
              </div>

          </div>

        </div>

        <div class="modal-footer justify-content-between">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

        </div>

      </div>

    </div>

</div>

<script src="{{ asset('js/saleshistory.js')}}"></script>

@stop