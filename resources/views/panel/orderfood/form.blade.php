@extends('panel.layout')
<link rel="stylesheet" href="{{asset('css/responsive.dataTables.min.css')}}">
@section('content-panel')



<link rel="stylesheet" href="{{ asset('css/orderfood.css')}}">
<link rel="stylesheet" href="{{ asset('css/select2.min.css')}}">
<script src="{{ asset('js/select2.min.js')}}"></script>
<script src="{{ asset('js/orderfood.js')}}"></script>

<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-3">

                    <h1 id="titulo">{{ $orderfood->id? 'Editar':'Nuevo' }} Comanda</h1>

                </div>

                <div class="col-sm-9">

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

                                    <label for="">Tipo de comanda {{$orderfood->ordertype}}</label> <br>
                                    <label class="btn btn-primary" onclick="CheckValuesOrder('restaurante')">
                                        <i class="fas fa-utensils fa-5x"></i>
                                        <br>
                                        @if($orderfood->ordertype == "restaurante")
                                        <input type="radio" name="ordertype" id="restaurant" autocomplete="off"
                                            value="restaurante" onclick="CheckValuesOrder('restaurante')">
                                        Restaurante
                                    </label>

                                    <label class="btn btn-primary" onclick="CheckValuesOrder('Domicilio')">
                                        <i class="fas fa-map-marker-alt fa-5x"></i>
                                        <br>
                                        <input type="radio" name="ordertype" id="order" autocomplete="off"
                                            value="Domicilio" onclick="CheckValuesOrder('Domicilio')">
                                        Domicilio
                                    </label>
                                    @else
                                    <input type="radio" name="ordertype" id="restaurant" autocomplete="off"
                                        value="restaurante" onclick="CheckValuesOrder('restaurante')">
                                    Restaurante
                                    </label>

                                    <label class="btn btn-primary" onclick="CheckValuesOrder('Domicilio')">
                                        <i class="fas fa-map-marker-alt fa-5x"></i>
                                        <br>
                                        <input type="radio" name="ordertype" id="order" autocomplete="off"
                                            value="Domicilio" onclick="CheckValuesOrder('Domicilio')">
                                        Domicilio
                                    </label>
                                    @endif



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
                                            class="btn active radondy">

                                            <img src="{{ asset('img/plantilla/mesa.png') }}" alt="" srcset="">
                                            <br>
                                            <input type="radio" name="tablenumber" id="option{{ $i }}" class="options"
                                                autocomplete="off" value="{{ $i }}">
                                            #{{ $i }}
                                        </label>
                                        @else
                                        <label class="btn radondy" id="radonly{{ $i }}">

                                            <img src="{{ asset('img/plantilla/mesa.png') }}" alt="" srcset="">
                                            <br>
                                            <input type="radio" name="tablenumber" id="option{{ $i }}" class="options "
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
                            <label class="label-style" for="date" >Fecha</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('date')"><i
                                            class="fas fa-calendar-day"></i></span>

                                </div>

                                <input step="any" id="date" name="date" placeholder="Fecha"
                                    class="form-control form-control-lg" required value="{{$orderfood->date}}">

                            </div>

                        </div>
                        <div class="col-md-6">
                            <label class="label-style" for="hour">Hora</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('hour')"><i
                                            class="fas fa-clock"></i></span>

                                </div>

                                <input type="time" step="any" id="hour" name="hour" placeholder="hora"
                                    class="form-control form-control-lg" required value="{{$orderfood->hour}}">

                            </div>

                        </div>


                        <div class="col-md-6" id="dname">
                            <label class="label-style" for="address">Nombre</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('name')"><i
                                            class="fas fa-map-marker-alt"></i></span>

                                </div>

                                <input type="text" step="any" id="name" name="name" placeholder="Nombre"
                                    class="form-control form-control-lg" value="{{$orderfood->name}}">

                            </div>

                        </div>

                        <div class="col-md-6" id="dlast_name">
                            <label class="label-style" for="address">Apellido</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('last_name')"><i
                                            class="fas fa-map-marker-alt"></i></span>

                                </div>

                                <input type="text" step="any" id="last_name" name="last_name" placeholder="Apellido"
                                    class="form-control form-control-lg" value="{{$orderfood->last_name}}">

                            </div>

                        </div>



                        <div class="col-md-6" id="daddress">
                            <label class="label-style" for="address">Domicilio</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('address')"><i
                                            class="fas fa-map-marker-alt"></i></span>

                                </div>

                                <input type="text" step="any" id="address" name="address" placeholder="domicilio"
                                    class="form-control form-control-lg" value="{{$orderfood->address}}">

                            </div>

                        </div>
                        <div class="col-md-6" id="dphone">
                            <label class="label-style" for="phone">Telefono</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('phone')"><i
                                            class="fas fa-phone-alt"></i></span>

                                </div>

                                <input type="number" step="any" id="phone" name="phone" placeholder="Telefono"
                                    class="form-control form-control-lg" value="{{$orderfood->phone}}" maxlength="10"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Menu:</h4>
                            <label for="">Selecciona los productos.</label>

                           

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <select class="selectpicker form-control mi-selector" name='marcas'>
                                                <option value='' disabled selected>Seleccionar un producto</option>
                                                @foreach($products as $key => $value)
                                                <option value="{{$value->id}},{{$value->name}},{{$key}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" onclick="checkAll(this)" id="allProducts"
                                                name="products[]" value="{{ $orderfood->productslist}}">
                                        </th>
                                        <th style="width: 10px">#</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    
                                </tbody>
                            </table>
                        </div>


                    </div>


                    <div class="card-footer">

                        <div class="row">

                            <div class="col-md-6">

                                <a href="{{route('orderfood')}}" class="btn btn-block btn-danger float-left cancelar">
                                    <i class="fa fa-fw fa-trash"></i> Cancelar
                                </a>

                            </div>

                            <div class="col-md-6">

                                <button type="submit" class="btn btn-block btn-success float-right" id="submitComand" onclick="disable()">
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
checkTables("#option" + '{{$orderfood->tablenumber}}');
CheckValuesOrder('{{$orderfood->ordertype}}');
$(document).ready(function() {

    const res = @json($res);
    console.log(res);
    for (var i = 0; i < res.length; i++) {
        console.log(res[i].product_id);
        $('#cbox' + res[i].product_id + '').attr('checked', true);
        $('#' + res[i].product_id + '').val(res[i].cantidad);
    }


});
</script>
<script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>



<!-- extension responsive 
-->
@stop