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

            <div class="modal-body">

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">
                            <h3 class="text-center">Metodo de pago</h3>
                            <div class="input-group">

                                <div class="input-group-btn mx-auto" data-toggle="buttons" id="Options">
                                    <label class="btn btn-primary active">
                                        <i class="fas fa-money-bill-wave fa-5x"></i>
                                        <br>
                                        <input type="radio" name="options" id="option1" autocomplete="off"
                                            checked>Efectivo
                                    </label>
                                    <label class="btn btn-primary">
                                        <i class="fas fa-credit-card fa-5x"></i>
                                        <br>
                                        <input type="radio" name="options" id="option2" autocomplete="off">Tarjeta
                                    </label>

                                </div>

                            </div>

                            <div class="input-group">
                                <label for="totalSales" class="col-sm-4 col-form-label">Total:</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="totalSales"
                                        name="totalSales">
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="comanda" class="col-sm-4 col-form-label">Núm. de comanda:</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="comanda"
                                        name="comanda">
                                </div>
                            </div>


                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" onclick="getFocus('payment')">
                                        <i class="fas fa-hand-holding-usd"></i></span>
                                </div>
                                <input type="number" name="payment" id="payment" placeholder="Pago con"
                                    class="form-control form-control-lg" required>

                            </div>
                            <p id="error"></p>

                        </div>

                    </div>

                </div>

                <div class="modal-footer justify-content">

                    <div class="col-sm container-fluid">

                        <div class="row">

                            <div class=" col-sm-6 btn-group">

                                <button id="cancel" type="button" class="btn btn-danger .px-2 " data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancelar</button>

                            </div>

                            <div class=" col-sm-6 btn-group">

                                <button type="button" id="sale" class="btn btn-success .px-2"><i
                                        class="fa fa-shopping-cart"></i> Cobrar</button>

                            </div>

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
                        <table class="table table-striped table-bordered" id="busquedaR">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Tipo de orden</th>
                                    <th>Num. de mesa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\Helper::getOrderFood("restaurante") as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->ordertype}}</td>
                                    <td>{{$value->tablenumber}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div id="domicilioList" display="block">
                        <table class="table table-striped table-bordered" id="busquedaD">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Tipo de orden</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\Helper::getOrderFood("domicilio") as $value)
                                <tr>

                                    <td>{{$value->id}}</td>
                                    <td>{{$value->ordertype}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->phone}}</td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>

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
let comanda = 0;
$(document).ready(function() {

})
$('#search').on('keyup', function(e) {

    if (e.keyCode == 13) {
        if ($("#content_table_sell").children().length == 0) {
            console.log("entro al search");
            $.ajax({
                method: "POST",
                url: "{{route('sell.search')}}",
                data: {
                    _token: "{!! csrf_token() !!}",
                    id: $('#search').val()
                },
                success: function(respuesta) {
                    console.log(respuesta);
                    $('#search').val("");
                    $('#search').attr("disabled", true);
                    $('#find').removeAttr("data-toggle");

                    comanda = respuesta[0].orderfood_id;
                    res = respuesta;

                    console.log(comanda);
                    console.log(res);
                    respuesta.forEach(t => {
                        $("#content_table_sell").append(
                            "<tr><td>" + t.product_id +
                            "</td><td>" + t.nombre +
                            "</td><td class='precio'>" + t.precio +
                            "</td><td class='cantidad'>" + t.cantidad +
                            "</td></tr>"
                        );
                        total = total + (t.precio * t.cantidad);
                    });
                    $('#total').text(total);

                },
                error: function() {
                    $('#search').val("");
                    swal.fire("¡Error!", "No se encuentra una comanda con ese codigo.", "error");
                }
            });
        } else {
            console.log("entro al else");
            $('#search').val("");
            $('#search').attr("disabled", true);
            $('#find').removeAttr("data-toggle");
            swal.fire("¡Cuidado!", "Comanda en venta. Finaliza la venta para cobrar otra comanda", "warning");
        }

    }

});

$('#sale').on('click', function(e) {
    var metodo = "";
    if ($('#option1').prop("checked")) {
        metodo = "Efectivo";
    } else {
        metodo = "Tarjeta";
    }
    console.log(res);
    if ($('#payment').val() >= $('#totalSales').val()) {

        $('#sale').attr('data-dismiss', 'modal');
        $.ajax({
            method: "POST",
            url: "{{route('sell.save')}}",
            data: {
                _token: "{!! csrf_token() !!}",
                res: res,
                total: $('#totalSales').val(),
                comanda: comanda,
                options: metodo,
                pago: $('#payment').val()
            }
        }).done(function(respuesta) {

            $("#content_table_sell td").remove();
            $('#total_table').text(respuesta[0].total);
            $('#payment_table').text(respuesta[0].pago);
            $('#change_table').text(respuesta[0].cambio);
            $('#total').text("");

            $('#search').removeAttr("disabled");
            $('#find').attr('data-toggle', 'modal');
            swal("!Good job!", "Venta finalizada", "success");
        });
    } else {
        $('#error').text("Monto menor al total");
        $('#error').css("color", "#ff0000");

    }
});

$('#busquedaD tbody tr').click(function() {
    $('#code_search').modal('hide');
    var id = $(this).find("td:first-child").text();
    console.log(id);
    $.ajax({
        method: "POST",
        url: "{{route('sell.search')}}",
        data: {
            _token: "{!! csrf_token() !!}",
            id: id
        },
        success: function(respuesta) {
            console.log(respuesta);
            $('#search').val("");
            $('#search').attr("disabled", true);
            $('#find').removeAttr("data-toggle");

            comanda = respuesta[0].orderfood_id;
            res = respuesta;

            console.log(comanda);
            console.log(res);
            respuesta.forEach(t => {
                $("#content_table_sell").append(
                    "<tr><td>" + t.product_id +
                    "</td><td>" + t.nombre +
                    "</td><td class='precio'>" + t.precio +
                    "</td><td class='cantidad'>" + t.cantidad +
                    "</td></tr>"
                );
                total = total + (t.precio * t.cantidad);
            });
            $('#total').text(total);

        },
        error: function() {
            $('#search').val("");
            swal.fire("¡Error!", "No se encuentra una comanda con ese codigo.", "error");
        }
    });
});
$('#busquedaR tbody tr').click(function() {
    $('#code_search').modal('hide');
    var id = $(this).find("td:first-child").text();
    console.log(id);
    $.ajax({
        method: "POST",
        url: "{{route('sell.search')}}",
        data: {
            _token: "{!! csrf_token() !!}",
            id: id
        },
        success: function(respuesta) {
            console.log(respuesta);
            $('#search').val("");
            $('#search').attr("disabled", true);
            $('#find').removeAttr("data-toggle");

            comanda = respuesta[0].orderfood_id;
            res = respuesta;

            console.log(comanda);
            console.log(res);
            respuesta.forEach(t => {
                $("#content_table_sell").append(
                    "<tr><td>" + t.product_id +
                    "</td><td>" + t.nombre +
                    "</td><td class='precio'>" + t.precio +
                    "</td><td class='cantidad'>" + t.cantidad +
                    "</td></tr>"
                );
                total = total + (t.precio * t.cantidad);
            });
            $('#total').text(total);

        },
        error: function() {
            $('#search').val("");
            swal.fire("¡Error!", "No se encuentra una comanda con ese codigo.", "error");
        }
    });
});

const orderfood = @json($orderfood);
const products = @json($products);
var regex = /^[0-9]$/;
let arrayidproducts = [];
let arrayidquantity = [];

for (var i = 0; i < orderfood.products.length; i++) {

    if (regex.test(orderfood.products[i])) {

        arrayidproducts.push(orderfood.products[i]);
        arrayidquantity.push(orderfood.quantity[i]);
    }

}
let aux = [];
for (var j = 0; j < arrayidproducts.length; j++) {
    $("#content_table_sell").append(
        "<tr><td>" + products[arrayidproducts[j]].id +
        "</td><td>" + products[arrayidproducts[j]].name +
        "</td><td class='precio'>" + products[arrayidproducts[j]].price +
        "</td><td class='cantidad'>" + arrayidquantity[j] +
        "</td></tr>"
    );
    aux.push({
        "product_id": products[arrayidproducts[j]].id,
        "nombre": products[arrayidproducts[j]].name,
        "precio": products[arrayidproducts[j]].price,
        "cantidad": arrayidquantity[j],
        "orderfood_id": orderfood.id
    });
    total = total + (products[arrayidproducts[j]].price * arrayidquantity[j]);
}

$('#total').text(total);
comanda = orderfood.id;
res = aux;
console.log(comanda);
console.log(res);
console.log(
    total);
</script>

<style>
#Options label input {
    position: absolute;
    opacity: 0;

}
</style>
<script src="{{ asset('js/sell.js')}}"></script>

@stop