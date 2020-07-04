@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>{{str_replace("_"," ", ucwords(\Helper::getExam($appointment->exam_id)->table_name))}}</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="clientes">Examenes</a></li>
            <li class="breadcrumb-item active">Nuevo examen</li>

          </ol>

        </div>

      </div>

    </div>

  </section>

  <section class="content">

    <div class="card">
      
      <form action="{{route('exam.save',$appointment)}}" method="post">
        {{csrf_field()}}
        <div class="card-body">

          <div class="row">           
            
            <?php 
              $lineas = file(\Helper::getExam($appointment->exam_id)->form_route);
              foreach ($lineas as $num_linea => $linea) {
                  echo $linea;
              }
            ?>

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