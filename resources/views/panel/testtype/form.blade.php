@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>{{ $testtype->id? 'Editar':'Nueva' }} Prueba</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="pruebas">Tipos de Pruebas</a></li>
            <li class="breadcrumb-item active">Crear prueba</li>

          </ol>

        </div>

      </div>

    </div>

  </section>

  <section class="content">

    <div class="card">

      <form action="{{route('testtype.save',$testtype)}}" method="post">

      	{{ csrf_field() }}

        <div class="card-body">

          <div class="row">

            <div class="col-md-6">

              <label class="label-style" for="name">Nombre</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('name')"><i class="fas fa-user"></i></span>

                  </div>

                  <input type="text" id="name" name="name" placeholder="Nombre" class="form-control form-control-lg capitalize" required value="{{$testtype->name}}">
                  <input type="hidden" name="tipo" value="0">

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="description">Descripcion</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('description')"><i class="fas fa-user"></i></span>

                  </div>

                  <input type="text" id="description" name="description" placeholder="Descripcion" class="form-control form-control-lg" required value="{{$testtype->description}}">

              </div>

            </div>

            <div class="col-md-6">

              <label class="label-style" for="description">Tipo de muestra</label>

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" onclick="getFocus('description')"><i class="fas fa-user"></i></span>

                  </div>

                  <select name="sample_id" id="sample_id" class="form-control form-control-lg">

                    @if(!$testtype->id)

                      <option value="">-- Seleccione el tipo --</option>

                    @else

                      <option value="{{$testtype->sample_id}}">{{\Helper::getSample($testtype->id)->name }}</option>
                    
                    @endif

                    @foreach (\Helper::getSample(0) as $value)
                      <option value="{{ $value['id'] }}">{{ $value->name }}</option>
                    @endforeach

                  </select>

              </div>

            </div>

          </div>

        </div>

        <div class="card-footer">

          <div class="row">

            <div class="col-md-6">

              <a href="{{route('testtype')}}" class="btn btn-block btn-danger float-left cancelar">
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