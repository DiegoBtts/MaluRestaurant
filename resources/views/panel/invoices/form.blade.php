@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>{{ $invoices->id? 'Editar':'Nuevo' }} Factura</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="">Facturas</a></li>
                        <li class="breadcrumb-item active">Crear Factura</li>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card">

            <form action="{{route('invoices.save',$invoices)}}" method="post">

                {{ csrf_field() }}

                <div class="card-body">

                    <div class="row">



                        <div class="col-md-6">

                            <label class="label-style" for="RFC">RFC</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('RFC')"><i
                                            class="fas fa-dollar-sign"></i></span>

                                </div>

                                <input type="text" step="any" id="RFC" name="RFC" placeholder="RFC"
                                    class="form-control form-control-lg" required value="{{$invoices->RFC}}">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="label-style" for="business_name">Empresa</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('business_name')"><i
                                            class="fas fa-dollar-sign"></i></span>

                                </div>

                                <input type="text" step="any" id="business_name" name="business_name"
                                    placeholder="Empresa" class="form-control form-control-lg" required
                                    value="{{$invoices->business_name}}">

                            </div>

                        </div>
                        <div class="col-md-6">

                            <label class="label-style" for="state">Estado</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('state')"><i
                                            class="fas fa-align-justify"></i></span>

                                </div>

                                <input type="text" id="state" name="state" placeholder="Estado"
                                    class="form-control form-control-lg capitalize" required
                                    value="{{$invoices->state }}">
                                <input type="hidden" name="tipo" value="0">

                            </div>

                        </div>
                        <div class="col-md-6">

                            <label class="label-style" for="citie">Ciudad</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('citie')"><i
                                            class="fas fa-align-justify"></i></span>

                                </div>

                                <input type="text" id="citie" name="citie" placeholder="Ciudad"
                                    class="form-control form-control-lg capitalize" required
                                    value="{{$invoices->citie}}">
                                <input type="hidden" name="tipo" value="0">

                            </div>

                        </div>
                        <div class="col-md-6">

                            <label class="label-style" for="address">Direccion</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('address')"><i
                                            class="fas fa-align-justify"></i></span>

                                </div>

                                <input type="text" id="address" name="address" placeholder="Direccion"
                                    class="form-control form-control-lg capitalize" required
                                    value="{{$invoices->address}}">
                                <input type="hidden" name="tipo" value="0">

                            </div>

                        </div>
                        <div class="col-md-6">

                            <label class="label-style" for="CP">Codigo postal</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('CP')"><i
                                            class="fas fa-align-justify"></i></span>

                                </div>

                                <input type="text" id="CP" name="CP" placeholder="Codigo Postal"
                                    class="form-control form-control-lg capitalize" required value="{{$invoices->CP}}">
                                <input type="hidden" name="tipo" value="0">

                            </div>

                        </div>
                        <div class="col-md-6">

                            <label class="label-style" for="phone">Telefono</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('phone')"><i
                                            class="fas fa-align-justify"></i></span>

                                </div>

                                <input type="text" id="phone" name="phone" placeholder="Telefono"
                                    class="form-control form-control-lg capitalize" required
                                    value="{{$invoices->phone}}">
                                <input type="hidden" name="tipo" value="0">

                            </div>

                        </div>
                        <div class="col-md-6">

                            <label class="label-style" for="email">Correo Electronico</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('email')"><i
                                            class="fas fa-dollar-sign"></i></span>

                                </div>

                                <input type="text" step="any" id="email" name="email" placeholder="Correo Electronico"
                                    class="form-control form-control-lg" required value="{{$invoices->email}}">

                            </div>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="sales">Codigo de venta</label>
                            <select class="form-control" id="sales" name="sales" required>
                                <option value="" disabled selected hidden>Seleccionar</option>
                                @foreach ($sales as $sale)
                                <option value="{{$sale->id}}">{{$sale->id}}</option>
                                @endforeach

                            </select>
                        </div>


                    </div>

                </div>

                <div class="card-footer">

                    <div class="row">

                        <div class="col-md-6">

                            <a href="{{route('invoices')}}" class="btn btn-block btn-danger float-left cancelar">
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

@stop