@extends('panel.layout')

@section('content-panel')
<?php 
  date_default_timezone_set('America/Hermosillo');
?>
<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>{{ $receiptsamples->id? 'Editar':'Recibir' }} muestra</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="">Recepción de muestras</a></li>
            <li class="breadcrumb-item active">Editar Recepción</li>

          </ol>

        </div>

      </div>

    </div>

  </section>

  <section class="content">

    <div class="card">

      <form action="{{route('receiptsamples.save',$receiptsamples)}}" method="post">

      	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

        <div class="card-body">

          <div class="row">

            <div class="col-md-6">

              <label class="label-style" for="expiration_date">{{ $flag ? 'Cita a recibir':'Citas sin muestra' }}</label>

              <div class="input-group mb-3">

                <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                </div>

                <select name="appointment_id" id="appointment_id" class="form-control form-control-lg" required>
                  @if($flag)
                    <option value="{{$citas->id}}">{{$citas->appointment_code}}</option>
                  @else
                    @foreach($citas as $key => $value)
                      <option value="{{$value->id}}">{{$value->appointment_code}}</option>
                    @endforeach
                  @endif
                </select>

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="expiration_date">Muestra necesaria para examen</label>

              <div class="input-group mb-3">

                <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                </div>

                <input class="form-control form-control-lg" type="text" id="sample" readonly>

              </div>

            </div>

          </div>

          <div class="row">

            <div class="col-md-6">

              <label class="label-style" for="receiptsamplesdate">Fecha de Recepción</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('receiptsamplesdate')"><i class="fas fa-calendar"></i></span>

                  </div>
                   
                  @if($receiptsamples->id)
                    <input type="date"  id="receiptsamplesdate" name="receiptsamplesdate" class="form-control form-control-lg" value="{{$receiptsamples->receiptsamplesdate}}" readonly>
                  @else
                    <input type="date"  id="receiptsamplesdate" name="receiptsamplesdate" class="form-control form-control-lg" value="<?php echo date("Y-m-d");?>" readonly>
                  @endif                 

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="hour">Hora</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('hour')"><i class="fas fa-clock"></i></span>

                  </div>

                  @if($receiptsamples->id)
                    <input type="time"  id="hour" name="hour" class="form-control form-control-lg" value="{{$receiptsamples->hour}}" readonly>
                  @else
                    <input type="time"  id="hour" name="hour" class="form-control form-control-lg" value="<?php echo date('h:i:s');?>" readonly>
                  @endif 

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="expiration_date">Insumo</label>

              <div class="input-group mb-3">

                <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                </div>

                <select name="product_id" id="product_id" class="form-control form-control-lg">
                    <option value="">Seleccione un item (opcional)</option>
                    @foreach(\Helper::getProducts(0) as $key => $value)
                      <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>

              </div>

            </div>

          </div>

        </div>

        <div class="card-footer">

          <div class="row">

            <div class="col-md-6">

            <a href="{{route('receiptsamples')}}" class="btn btn-block btn-danger float-left cancelar">
                <i class="fa fa-fw fa-minus"></i> Cancelar
              </a>

            </div>

            <div class="col-md-6">

              <button type="submit" class="btn btn-block btn-success float-right">
                <i class="fa fa-fw fa-plus"></i> Recibir
              </button>

            </div>

          </div>

        </div>

      </form>

    </div>

  </section>

</div>
<script src="{{ asset('js/receiptsamples.js')}}"></script>
@stop