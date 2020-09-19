@extends('panel.layout')
<link rel="stylesheet" href="{{asset('css/responsive.dataTables.min.css')}}">
@section('content-panel')

<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Historial de Ventas</h1>

                </div>
                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <button class="btn btn-block btn-success" saleId="#" data-toggle="modal"
                            data-target="#modalDetails"><i class="fa fa-cash-register mr-1"></i>Corte fin dia
                            </buttton>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card">

            <div class="card-body">

                <table class="table table-bordered table-hover tableSales" id="ok">

                    <thead>

                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Metodo de pago</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Detalles de venta</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($items as $key => $value)
                        <tr>
                            <td>{{(count($items)-($key+1)+1)}}</td>
                            <td>{{$value->payment_method}}</td>
                            <td>{{$value->total}}</td>
                            <td>{{$value->created_at->format("d/m/Y")}}</td>
                            <td>
                                <button type="button" id="details" value="{{$value->id}}" class="btn btn-warning"
                                    data-toggle="modal" data-target="#detailsVenta{{$value->id}}">Detalles</button>
                                <!-- Modal details -->
                                <div class="modal fade" id="detailsVenta{{$value->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-center" id="exampleModalLongTitle">Detalles
                                                    suscriptor
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered table-hover tableSales"
                                                    id="kt_table_1">
                                                    <thead>
                                                        <th>Codigo</th>
                                                        <th>Descripcion</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach(json_decode($value->details) as $key => $details)
                                                        <tr>
                                                            <td>{{$details->product_id}}</td>
                                                            <td>{{$details->nombre}}</td>
                                                            <td>{{$details->precio}}</td>
                                                            <td>{{$details->cantidad}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <!-- Errores de validaciones -->
                                                <div class="alert alert-outline-danger print-error-msg"
                                                    style="display:none">
                                                    <ul class="mb-0"></ul>
                                                </div>
                                                <!-- Fin validaciones -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
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

    <div class="modal-dialog modal-md">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title text-center">Corte fin dia</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <input type="hidden" value="{{ csrf_token() }}" id="token">

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">

                        <table class="table tableDetails">
                            <tr>
                                <th>Total</th>
                                <td id="total">{{$total}}</td>
                            </tr>
                            <tr>
                                <th>Fecha</th>
                                <td>{{$fecha}}</td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>

            <div class="modal-footer justify-content-between">

                <button type="button" class="btn btn-danger " data-dismiss="modal"><i
                        class="fa fa-times mr-1"></i>Cerrar</button>
                <button type="button" id="btnimprimir" class="btn btn-info " data-dismiss="modal"><i
                        class="fa fa-print mr-1"></i>Imprimir</button>

            </div>

        </div>

    </div>

</div>


<script src="{{ asset('js/saleshistory.js')}}"></script>
<script src="{{asset('js/dataTables.responsive.min.js')}}">
</script>
<script src="{{asset('js/datatables.min.js')}}">
</script>
<script>
$(document).ready(function() {
    $("#btnimprimir").click(function() {

        $.ajax({
            url: "{{route('saleshistory.ticket')}}",
            data: {
                _token: "{!! csrf_token() !!}",
                total: $("#total").text(),
            },
            method: "POST",
            success: function(response) {
                console.log(response);
            },
        });

    });
});
</script>
@stop