@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-2">

                    <h1>{{ $product->id? 'Editar':'Nuevo' }} Producto</h1>

                </div>

                <div class="col-sm-10">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="">Productos</a></li>
                        <li class="breadcrumb-item active">Crear Producto</li>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card">

            <form action="{{route('product.save',$product)}}" method="post">

                {{ csrf_field() }}

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">

                            <label class="label-style" for="name">Nombre</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('name')"><i
                                            class="fas fa-align-justify"></i></span>

                                </div>

                                <input type="text" id="name" name="name" placeholder="Nombre"
                                    class="form-control form-control-lg capitalize" required value="{{$product->name}}">
                                <input type="hidden" name="tipo" value="0">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="label-style" for="price">Precio</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('price')"><i
                                            class="fas fa-dollar-sign"></i></span>

                                </div>

                                <input type="number" step="any" id="price" name="price" placeholder="Precio de compra"
                                    class="form-control form-control-lg" required value="{{$product->price}}">

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card-footer">

                    <div class="row">

                        <div class="col-md-6">

                            <a href="{{route('product')}}" class="btn btn-block btn-danger float-left cancelar">
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