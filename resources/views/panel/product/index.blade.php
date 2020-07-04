@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Inventario</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <a href="{{route('product.add')}}" class="btn btn-block btn-primary"><i class="fa fa-fw fa-plus"></i>Agregar Producto</a>

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
              <th>Nombre</th>
              <th>Costo</th>
              <th>Stock minimo</th>
              <th>Stock</th>
              <th>Categoria</th>
              <th>Fecha de Expiracion</th>
              <th>Acciones</th>
            </tr>

          </thead>

          <tbody>
            
            @foreach($items as $key => $value)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$value->name}}</td>
              <td>${{$value->purchase_price}}</td>
              <td>{{$value->stock_min}}</td>
              <td>{{$value->stock}}</td>
              <td>{{\Helper::getCategories($value->categoria_id)->name}}</td>
              <td>{{$value->expiration_date}}</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-success btnAddStock" productId="{{$value->id}}" data-toggle="modal" data-target="#modalAddStock" title="Agregar stock"><i class="fa fa-plus"></i></button>
                  <button class="btn btn-secondary btnRestStock" productId="{{$value->id}}" data-toggle="modal" data-target="#modalRestStock" title="Agregar stock"><i class="fa fa-minus"></i></button>
                  <a href="{{route('product.edit',$value->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                  <button id="delete" ProductId = "{{$value->id}}" class="btn btn-danger"><i class="fa fa-times"></i></button>
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

<div class="modal fade" id="modalAddStock">

    <div class="modal-dialog">

        <div class="modal-content">

          <form method = "POST" action="{{route('product.saveStock')}}">
          {{ csrf_field() }}

            <div class="modal-header">

                <h4 class="modal-title">Aumentar Stock</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body">

              <div class="row">

                <div class="col-md-12">
                    <label class="label-style" for="nombreA">Nombre</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" onclick="getFocus('nombreA')">
                            <i class="fas fa-dolly"></i></span>
                        </div>
                        <input type="text" id="name" placeholder="Nombre" class="form-control form-control-lg capitalize" readonly>
                        <input type="hidden" id="product_id" name="product_id">
                        <input type="hidden" value="up" name="flag">
                    </div>
                </div>

                <div class="col-md-12">

                    <label class="label-style" for="stockA">Stock</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" onclick="getFocus('stockA')">
                            <i class="fas fa-hashtag"></i></span>
                        </div>
                        <input type="number" name="stock" id="stock" placeholder="Cantidad" class="form-control form-control-lg" required>
                    </div>

                </div>

              </div>

            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
          </form>
        </div>

    </div>

</div>

<div class="modal fade" id="modalRestStock">

    <div class="modal-dialog">

        <div class="modal-content">

          <form method = "POST" action="{{route('product.saveStock')}}">
          {{ csrf_field() }}

            <div class="modal-header">

                <h4 class="modal-title">Baja Stock</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body">

              <div class="row">

                <div class="col-md-12">
                    <label class="label-style" for="nombreA">Nombre</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" onclick="getFocus('nombreA')">
                            <i class="fas fa-dolly"></i></span>
                        </div>
                        <input type="text" id="names" placeholder="Nombre" class="form-control form-control-lg capitalize" readonly>
                        <input type="hidden" id="product_id_2" name="product_id">
                        <input type="hidden" value="down" name="flag">
                    </div>
                </div>

                <div class="col-md-12">

                    <label class="label-style" for="stockA">Stock</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" onclick="getFocus('stockA')">
                            <i class="fas fa-hashtag"></i></span>
                        </div>
                        <input type="number" name="stock" id="stock" placeholder="Cantidad" class="form-control form-control-lg" required>
                    </div>

                </div>

              </div>

            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
          </form>
        </div>

    </div>

</div>

<script src="{{ asset('js/product.js')}}"></script>

@stop