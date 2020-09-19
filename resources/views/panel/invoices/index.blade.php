@extends('panel.layout')
<link rel="stylesheet" href="{{asset('css/responsive.dataTables.min.css')}}">
@section('content-panel')

<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Facturacion</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <a href="{{route('invoices.add')}}" class="btn btn-block btn-primary"><i
                                class="fa fa-fw fa-plus"></i>Crear Factura</a>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card">

            <div class="card-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <table class="table table-bordered table-hover tableProduct" id="tproduct">

                    <thead>

                        <tr>
                            <th style="width: 10px">#</th>
                            <th>RFC</th>
                            <th>Empresa</th>
                            <th>Estado</th>
                            <th>Ciudad</th>
                            <th>Direccion</th>
                            <th>Codigo Postal</th>
                            <th>Telefono</th>
                            <th>Correo Electronico</th>

                            <th>Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($items as $key => $value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->RFC}}</td>
                            <td>{{$value->business_name}}</td>
                            <td>{{$value->state}}</td>
                            <td>{{$value->citie}}</td>
                            <td>{{$value->address}}</td>
                            <td>{{$value->CP}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{$value->email}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('invoices.edit',$value->id)}}" class="btn btn-warning"><i
                                            class="fa fa-eye"></i></a>
                                    <button id="delete" InvoicesId="{{$value->id}}" class="btn btn-danger"><i
                                            class="fa fa-times"></i></button>
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




<script src="{{ asset('js/product.js')}}"></script>
<script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>
@stop