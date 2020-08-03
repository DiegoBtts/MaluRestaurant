@extends('panel.layout')

@section('content-panel')

<link rel="stylesheet" href="{{ asset('css/orderfood.css')}}">
<script src="{{ asset('js/orderfood.js')}}"></script>
<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 id="titulo">{{ $orderfood->id? 'Editar':'Nuevo' }} Comanda</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="">Comandas</a></li>
                        <li class="breadcrumb-item active">Crear Comanda</li>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card">

            <form action="{{route('orderfood.save',$orderfood)}}" method="post">

                {{ csrf_field() }}

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="input-group">

                                <div class="input-group-btn" data-toggle="buttons" id="Options">

                                    <label for="">Tipo de comanda</label> <br>
                                    <label class="btn btn-primary active">
                                        <i class="fas fa-utensils fa-5x"></i>
                                        <br>
                                        <input type="radio" name="ordertype" id="restaurant" autocomplete="off"
                                            value="restaurante ">
                                        Restaurante
                                    </label>

                                    <label class="btn btn-primary">
                                        <i class="fas fa-map-marker-alt fa-5x"></i>
                                        <br>
                                        <input type="radio" name="ordertype" id="order" autocomplete="off"
                                            value="Domicilio">
                                        Domicilio
                                    </label>



                                </div>

                            </div>



                        </div>

                    </div>
                    <div class=" row">
                        <div class="col-md-12-">
                            <div class="input-group mx-auto">

                                <div class="input-group-btn mx-auto" data-toggle="buttons" id="tablenumber">
                                    <label for="">Numero de mesas</label> <br>
                                    @for($i = 1; $i <= 8; $i++) @if($orderfood->tablenumber == $i)<label
                                            class="btn btn-primary active">

                                            <img src="{{ asset('img/plantilla/mesa.png') }}" alt="" srcset="">
                                            <br>
                                            <input type="radio" name="tablenumber" id="option{{ $i }}"
                                                autocomplete="off" value="{{ $i }}" checked>
                                            #{{ $i }}
                                        </label>
                                        @else
                                        <label class="btn btn-primary active">

                                            <img src="{{ asset('img/plantilla/mesa.png') }}" alt="" srcset="">
                                            <br>
                                            <input type="radio" name="tablenumber" id="option{{ $i }}"
                                                autocomplete="off" value="{{ $i }}">
                                            #{{ $i }}
                                        </label>
                                        @endif

                                        @endfor

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="label-style" for="date">Fecha</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('date')"><i
                                            class="fas fa-map-marker-alt"></i></span>

                                </div>

                                <input type="date" step="any" id="date" name="date" placeholder="Fecha"
                                    class="form-control form-control-lg" required value="{{$orderfood->date}}">

                            </div>

                        </div>
                        <div class="col-md-6">
                            <label class="label-style" for="hour">Hora</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('hour')"><i
                                            class="fas fa-map-marker-alt"></i></span>

                                </div>

                                <input type="time" step="any" id="hour" name="hour" placeholder="hora"
                                    class="form-control form-control-lg" required value="{{$orderfood->hour}}">

                            </div>

                        </div>
                        <div class="col-md-6">
                            <label class="label-style" for="address">Domicilio</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('address')"><i
                                            class="fas fa-map-marker-alt"></i></span>

                                </div>

                                <input type="text" step="any" id="address" name="address" placeholder="domicilio"
                                    class="form-control form-control-lg" required value="{{$orderfood->address}}">

                            </div>

                        </div>
                        <div class="col-md-6">
                            <label class="label-style" for="phone">Telefono</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('phone')"><i
                                            class="fas fa-phone-alt"></i></span>

                                </div>

                                <input type="tel" step="any" id="phone" name="phone" placeholder="Telefono"
                                    class="form-control form-control-lg" required value="{{$orderfood->phone}}">

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Menu:</h4>
                            <label for="">Selecciona los productos.</label>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" onclick="checkAll(this)" id="allProducts"
                                                name="products[]" value="{{ $orderfood->productslist}}">
                                        </th>
                                        <th style="width: 10px">#</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($products as $key => $value)
                                    <tr>
                                        <td><input type="checkbox" name="products[]" value="{{$value->id}}"
                                                onclick="check({{$value->id}})">
                                        </td>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->name}}</td>
                                        <td><input type="number" name="quantity[]" id="{{$value->id}}"></td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>


                    <div class="card-footer">

                        <div class="row">

                            <div class="col-md-6">

                                <a href="{{route('orderfood')}}" class="btn btn-block btn-danger float-left cancelar">
                                    <i class="fa fa-fw fa-plus"></i> Cancelar
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
<script>
const orderfood = @json($orderfood);
const products = @json($products);
var regex = /^[0-9]$/;
let arrayidproducts = [];
let arrayidquantity = [];

for (var i = 0; i < orderfood.products.length; i++) {

    if (regex.test(orderfood.products[i])) {
        console.log("entro al if");
        arrayidproducts.push(orderfood.products[i]);
        arrayidquantity.push(orderfood.quantity[i]);
    }

}

var cbs = document.getElementsByTagName("input");
for (var i = 0; i < cbs.length; i++) {
    if (cbs[i].type == "checkbox") {
        console.log("es un checkbox");
        for (var j = 0; j < arrayidproducts.length; j++) {
            if (cbs[i].value == arrayidproducts[j]) {
                console.log("es un producto seleccionado");
                cbs[i].checked = true;
                document.getElementById(arrayidproducts[j]).required = true;
                document.getElementById(arrayidproducts[j]).value = arrayidquantity[j];
            }

        }
    }
}
if (orderfood.ordertype == document.getElementById("order").value) {
    document.getElementById("order").checked = true

} else {
    document.getElementById("restaurant").checked = true;
}
</script>


@stop