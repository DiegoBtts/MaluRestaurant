@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">
          <h1>{{str_replace("_"," ", ucwords($groups->table_name))}} historial</h1>
        </div>

      </div>

    </div>

  </section>

  @php
    $data =\Helper::createDataTable($groups->table_name);
    $headers =\Helper::createHeaderTable($groups->table_name);
  @endphp

  <section class="content">

    <div class="card">

      <div class="card-body">

        <table class="table table-bordered table-hover tableExam">

          <thead>

            <tr>
                @foreach ($headers as $key => $columns) 
                  @if($columns != "user_id")
                    @if($columns == "appointment_id")
                    <th>Detalles</th>
                    @else
                    <th>{{ str_replace("_"," ", ucwords($columns)) }}</th>
                    @endif  
                  @endif                
                @endforeach
                <th>Acciones</th>
            </tr>

          </thead>

          <tbody>

              @foreach ($data as $key => $datas) 
                <tr>
                  @foreach($headers as $ki => $columns)

                    @if($columns != "user_id")
                     
                      @if($columns == "appointment_id")

                          <td><button class="btn btn-success details" appointmentId="{{$datas[$columns]}}" data-toggle="modal" data-target="#modalDetails">{{\Helper::getClient(\Helper::getAppointment($datas[$columns])->client_id)->name}}</button></td>

                      @else

                        @if($columns == "id")

                            <td>{{(count($data)-($key+1)+1)}}</td>

                        @else

                          <td>{{$datas[$columns]}}</td>

                        @endif

                      @endif

                    @endif

                  @endforeach

                  <td>
                    <div class="btn-group">
                      <button table_name="{{$groups->table_name}}" id_exam="{{$datas['id']}}" class="btn btn-primary print"><i class="fa fa-print"></i></button>
                      <button id="delete" id_exam = "{{$datas['id']}}" class="btn btn-danger"><i class="fa fa-times"></i></button>
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

<div class="modal fade" id="modalDetails">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <div class="modal-header">

          <h4 class="modal-title">Detalles de cita</h4>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>

        </div>
          
        <input type="hidden" value="{{ csrf_token() }}" id="token">

        <div class="modal-body">

          <div class="row">
              
              <div class="col-md-12">
                <table class="table tableDetails">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Cliente</th>
                      <th>Examen</th>
                      <th>Tipo</th>
                      <th>Fecha</th>
                    </tr>
                  </thead>

                  <tbody id="content_table_details">        
                    
                  </tbody>

                </table>
              </div>

          </div>

        </div>

        <div class="modal-footer justify-content-between">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

        </div>

      </div>

    </div>

</div>

<script>
  $(".tableExam tbody").on("click","button#delete",function()
  {
    var id_exam = $(this).attr("id_exam");
    swal.fire({
      title: '¿esta seguro de esto?',
      text: "¡si no lo esta puede cancelar!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Eliminar'
    }).then((result)=>
    {
      if (result.value)
      {
        window.location = "/exam/delete/"+id_exam+"/"+{{$groups->id}};
      }
    })
</script>

<script src="{{ asset('js/exam.js')}}"></script>

@stop