@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Pruebas</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <a href="{{route('testtype.add')}}" class="btn btn-block btn-primary"><i class="fa fa-fw fa-plus"></i>Agregar prueba</a>

          </ol>

        </div>

      </div>

    </div>

  </section>

  <section class="content">

    <div class="card">

      <div class="card-body">

        <table class="table table-bordered table-hover tableTestType">

          <thead>

            <tr>
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Descripcion</th>   
              <th>Muestra</th>             
              <th>Acciones</th>
            </tr>

          </thead>

          <tbody>
            
            @foreach($items as $key => $value)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->description}}</td>
              <td>{{ \Helper::getSample($value->sample_id)->name }}</td>
              <td>
                <div class="btn-group">
                  <a href="{{route('testtype.edit',$value->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                  <button id="delete" TestTypeId = "{{$value->id}}" class="btn btn-danger"><i class="fa fa-times"></i></button>
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

<script type="text/javascript">
  $(document).ready(function()
  {
    @if(isset($message))
    for (var i = 0; i < 4; i++)
    {
      toastr.warning('{{$message}}');
    }
    @endif
  })
</script>

<script src="{{ asset('js/TestType.js')}}"></script>

@stop