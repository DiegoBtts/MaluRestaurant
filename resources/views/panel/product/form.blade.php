@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>{{ $product->id? 'Editar':'Nuevo' }} Producto</h1>

        </div>

        <div class="col-sm-6">

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

                    <span class="input-group-text" onclick="getFocus('name')"><i class="fas fa-align-justify"></i></span>

                  </div>

                  <input type="text" id="name" name="name" placeholder="Nombre" class="form-control form-control-lg capitalize" required value="{{$product->name}}">
                  <input type="hidden" name="tipo" value="0">

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="purchase_price">Precio Compra</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('purchase_price')"><i class="fas fa-dollar-sign"></i></span>

                  </div>

                  <input type="number" step="any" id="purchase_price" name="purchase_price" placeholder="Precio de compra" class="form-control form-control-lg" required value="{{$product->purchase_price}}">

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="stock">Exstencia</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('stock')"><i class="fas fa-capsules"></i></span>

                  </div>

                  <input type="number" min="1" id="stock" name="stock" placeholder="stock" class="form-control form-control-lg" required value="{{$product->stock}}">

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="stock_min">Existencia Minima</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('stock_min')"><i class="fas fa-capsules"></i></span>

                  </div>

                  <input type="number" min="1" max="100" id="stock_min" name="stock_min" placeholder="stock_min" class="form-control form-control-lg" required value="{{$product->stock_min}}">

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="expiration_date">Fecha de Expiracion</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('expiration_date')"><i class="fas fa-calendar-alt"></i></span>

                  </div>

                  <input type="date" id="expiration_date" name="expiration_date" placeholder="expiration_date" class="form-control form-control-lg" value="{{$product->expiration_date}}" required>

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="expiration_date">Categoria</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-greater-than"></i></span>

                  </div>
                  <select name="categoria_id" id="categoria_id" class="form-control form-control-lg">
                    @if(!$product->id)
                    <option value="">-- Seleccione la categoria --</option>
                    @else
                    <option value="{{$product->categoria_id}}">{{\Helper::getCategories($product->id)->name}}</option>
                    @endif

                    @foreach (\Helper::getCategories(0) as $value)
                    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                    @endforeach
                    </select>
                  
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