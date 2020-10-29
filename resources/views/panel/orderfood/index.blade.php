@extends('panel.layout')
<link rel="stylesheet" href="{{asset('css/responsive.dataTables.min.css')}}">
@section('content-panel')


<div id="viewComands" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Comanda #</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
         <table id="comandTable" class="table table-striped table-bordered" style="width:100%">
                                <thead >
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>

                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
        
        </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal" onclick="clearDatatable()">Close</button>
      </div>
      
      
    </div>
  </div>
</div>


<hr>




<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-2">

                    <h1>Comandas</h1>

                </div>
                <div class="col-sm-10">

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

                <table id="ok" class="table table-bordered table-hover tableOrderFood">

                    <thead>

                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tipo de orden</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estatus</th>

                            <th>Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($items as $key => $value)
                        <tr>
                            <td id="{{$value->id}}">{{$value->id}}</td>
                            <td>{{$value->ordertype}}</td>
                            <td>{{$value->date}}</td>
                            <td>{{$value->hour}}</td>
                            @if($value->status == 0)
                            <td>Pendiente</td>
                            @else
                            <td>Finalizada</td>
                            @endif
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#viewComands" onclick="viewTable({{$value->id}})"><i
                                            class="fa fa-eye"></i></button>
                                    <a href="{{route('orderfood.edit',$value->id)}}" class="btn btn-warning"><i
                                            class="fa fa-edit"></i></a>
                                    <button id="delete" orderfoodId="{{$value->id}}" class="btn btn-danger"><i
                                            class="fa fa-times"></i></button>
                                    <a href="{{route('sell.sale',$value->id)}}" class="btn btn-success"><i
                                            class="fa fa-cash-register"></i></a>
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

<script>

function viewTable(idcomand){
    clearDatatable();
    $.ajax({
                url: "{{route('orderfood.show')}}",
                data: {
                    _token: "{!! csrf_token() !!}",
                    id:idcomand,
                },
                method: "POST",
                success: function(res, response) {
                        console.log(res);
                        var t = $('#comandTable').DataTable();
                        $("#exampleModalLabel").text("Comanda # "+ idcomand);
                    for (let index = 0; index < res.length; index++) {
                        
                        t.row.add( [
                            res[index]['nombre'],
                            res[index]['cantidad'],
                            
                        ] ).draw( false );
                        } 
                },
            });
            
 }
            
</script>

<script src="{{ asset('js/orderfood.js')}}"></script>

<!-- extension responsive -->
<script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('js/datatables.min.js')}}"></script>
@stop