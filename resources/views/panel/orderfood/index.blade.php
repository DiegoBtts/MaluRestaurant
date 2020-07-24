@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Comandas</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <a href="{{route('orderfood.add')}}" class="btn btn-block btn-primary"><i
                                class="fa fa-fw fa-plus"></i>Agregar Comanda</a>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card">

            <div class="card-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <table class="table table-bordered table-hover tableProduct">

                    <thead>

                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tipo de orden</th>
                            <th>Fecha</th>
                            <th>Hora</th>

                            <th>Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($items as $key => $value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->ordertype}}</td>
                            <td>{{$value->date}}</td>
                            <td>{{$value->hour}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('orderfood.edit',$value->id)}}" class="btn btn-warning"><i
                                            class="fa fa-eye"></i></a>
                                    <button id="delete" orderfoodId="{{$value->id}}" class="btn btn-danger"><i
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

@stop