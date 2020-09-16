@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

    <section class="content-header" style="padding-bottom: 0px;">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <div class="row">

                        <div class="col-md-12">

                            <h1>Ventas</h1>

                        </div>

                        <div class="col-md-12">

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('search')"><i
                                            class="fas fa-barcode"></i></span>

                                </div>

                                <input type="text" id="search" name="search" placeholder="Codigo"
                                    class="form-control form-control-lg capitalize" autofocus>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <button id="find" class="btn btn-block btn-primary" data-toggle="modal"
                            data-target="#code_search"><i class="fa fa-fw fa-search"></i>Buscar Codigo</button>

                    </ol>
                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card">

            <div class="card-body">

                <div class="tableScroll">

                    <table class="table tableSell">

                        <thead>

                            <tr>
                                <th>Codigo</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                            </tr>

                        </thead>

                        <tbody id="content_table_sell">

                        </tbody>

                    </table>

                </div>

                <div class="row mt-3">

                    <div class="col-sm-4">

                        <table class="container-fluid table table-bordered ">

                            <thead>
                                <th>Total:</th>
                                <th>Pago con:</th>
                                <th>Cambios:</th>
                            </thead>

                            <tbody>

                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div class="col-md-6 pull-left">
                                            <p class="pom" id="total_table">0.0</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <i class="fas fa-money-bill-wave"></i>
                                        </div>
                                        <div class="col-md-6 pull-left">
                                            <p class="pom" id="payment_table">0.0</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <i class="fas fa-coins"></i>
                                        </div>
                                        <div class="col-md-6 pull-left">
                                            <p class="pom" id="change_table">0.0</p>
                                        </div>
                                    </div>
                                </td>

                            </tbody>

                        </table>

                    </div>

                    <div class="col-sm-4 container-fluid">

                        <div class="row">

                            <div class=" col-sm-6 btn-group-vertical">

                                <button id="deleteAll" class="btn btn-danger "><i class="fa fa-trash-alt"></i>
                                    Eliminar</button>

                                <a href="{{route('saleshistory')}}" class="btn btn-warning mt-1"><i
                                        class="fa fa-file-invoice-dollar"></i> Reimprimir Ticked</a>

                            </div>

                            <div class=" col-sm-6 btn-group">

                                <button id="action" class="btn btn-success" data-target="#modalSell"><i
                                        class="fa fa-shopping-cart"></i>
                                    Cobrar</button>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="row">

                            <div class="col-md-3">

                                <h3><b>Total:</b></h3>

                            </div>

                            <div class="col-md-6">

                                <div class="pull-left">

                                    <p class="totalLetter">$<span id="total">0.0</span></p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <input type="hidden" name="orderfoods" id="orderfoods">

                </div>

            </div>

        </div>

    </section>

</div>

<div class="modal fade" id="modalSell">

    <div class="modal-dialog">

        <div class="modal-content">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenSell">

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12">

                        <div class="row">

                            <div class="col-md-12">

                                <h3 class="text-center"><b>Total de venta</b></h3>

                            </div>

                            <div class="col-md-12">

                                <div class="pull-left">

                                    <p class="totalLetter text-center">$<span id="total-two">0.0</span></p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="input-group">

                            <div class="input-group-btn mx-auto" data-toggle="buttons" id="Options">
                                <label class="btn btn-primary active">
                                    <i class="fas fa-money-bill-wave fa-5x"></i>
                                    <br>
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked>Efectivo
                                </label>
                                <label class="btn btn-primary">
                                    <i class="fas fa-credit-card fa-5x"></i>
                                    <br>
                                    <input type="radio" name="options" id="option2" autocomplete="off">Tarjeta
                                </label>

                            </div>

                        </div>


                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text" onclick="getFocus('stockA')">
                                    <i class="fas fa-hand-holding-usd"></i></span>
                            </div>
                            <input type="number" name="payment" id="payment" placeholder="Pago con"
                                class="form-control form-control-lg" required>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer justify-content">

                <div class="col-sm container-fluid">

                    <div class="row">

                        <div class=" col-sm-6 btn-group">

                            <button id="cancel" type="button" class="btn btn-danger .px-2 " data-dismiss="modal"><i
                                    class="fa fa-times"></i> Eliminar</button>

                        </div>

                        <div class=" col-sm-6 btn-group">

                            <button type="button" id="sale" class="btn btn-success .px-2" data-dismiss="modal"><i
                                    class="fa fa-shopping-cart"></i> Cobrar</button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="modal fade" id="code_search">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-body">

                <div class="container">

                    <h4 class="text-center">Busqueda de codigo</h4>

                    <label for="">
                        <input type="radio" value="restaurante" name="ordertype"
                            id="restaurante">&nbsp;&nbsp;Restaurante
                        <input type="radio" value="domicilio" name="ordertype" id="domicilio">&nbsp;&nbsp;Domicilio
                    </label>
                    <br>
                    <div id="restauranteList">

                        <b id=" etiquetas">Codigo:&nbsp;&nbsp;&nbsp;Tipo de orden:&nbsp;&nbsp;&nbsp;Número de mesa:</b>
                        <div class="search_list">

                            <ul class="list-group find_code" id="List">

                                @foreach(\Helper::getOrderFood("restaurante") as $value)
                                <li class="list-group-item" code="{{$value->id}}">{{$value->id}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$value->ordertype}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$value->tablenumber}}
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div id="domicilioList" display="block">

                        <b id=" etiquetas">Codigo:&nbsp;&nbsp;&nbsp;Tipo de orden:&nbsp;&nbsp;&nbsp;Teléfono:</b>
                        <div class="search_list">

                            <ul class="list-group find_code" id="List">

                                @foreach(\Helper::getOrderFood("domicilio") as $value)
                                <li class="list-group-item" code="{{$value->id}}">{{$value->id}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$value->ordertype}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$value->phone}}
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <div class="row">

                    <div class="col-md-6">

                        <button type="button" id="close_find" style="float: left;"
                            class="btn btn-md btn-danger fa fa-times" data-dismiss="modal">Cerrar</button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">
var total = 0;
let res = 0;
const comanda = [];
$(document).ready(function() {
    @if(isset($message))
    for (var i = 0; i < 4; i++) {
        toastr.warning('{{$message}}');
    }
    @endif
})
$('#search').on('keyup', function(e) {
    if (e.keyCode == 13) {
        $.ajax({
            method: "POST",
            url: "{{route('sell.search')}}",
            data: {
                _token: "{!! csrf_token() !!}",
                id: $('#search').val()
            },
            success: function(respuesta) {
                comanda.push(respuesta[0].orderfood_id)
                res = respuesta;
                $('#search').val("");
                respuesta.forEach(t => {
                    $("#content_table_sell").append(
                        "<tr><td>" + t.product_id +
                        "</td><td>" + t.nombre +
                        "</td><td class='precio'>" + t.precio +
                        "</td><td class='cantidad'>" + t.cantidad +
                        "</td></tr>"
                    );
                    total = total + (t.precio * t.cantidad);
                });;
                $('#total').text(total);
            },
            error: function() {
                $('#search').val("");
                swal.fire("¡Error!", "No se encuentra una comanda con ese codigo.", "error");
            }
        });

    }
});
</script>

<style>
#Options label input {
    position: absolute;
    opacity: 0;

}
</style>
<script src="{{ asset('js/sell.js')}}"></script>

@stop