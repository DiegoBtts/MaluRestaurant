@extends('panel.layout')

@section('content-panel')

<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>{{ $appointment->id? 'Editar':'Nueva' }} Cita</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="">Citas</a></li>
                        <li class="breadcrumb-item active">Editar Cita</li>

                    </ol>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card">

            <form action="{{route('appointment.save',$appointment)}}" method="post">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">

                            <label class="label-style" for="expiration_date">Cliente</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                                </div>

                                <select name="client" id="client" class="form-control form-control-lg" required>

                                    <option value="">Seleccione un cliente</option>

                                    @foreach (\Helper::getClient(0) as $client)

                                    @if($appointment->client_id == $client->id)
                                    <option value="{{ $client['id'] }}" selected>{{ $client->name }}
                                        {{ $client->lastname }}</option>
                                    @else
                                    <option value="{{ $client['id'] }}">{{ $client->name }} {{ $client->lastname }}
                                    </option>
                                    @endif

                                    @endforeach

                                    <input type="hidden" id="code_encode" name="code_encode"
                                        value="{{$appointment->code}}">
                                    <input type="hidden" id="appointment_code" name="appointment_code"
                                        value="{{$appointment->appointment_code}}">

                                </select>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="label-style" for="expiration_date">Examen</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                                </div>

                                <select name="exam_id" id="exam_id" class="form-control form-control-lg" required>

                                    <option value="">Seleccionar examen</option>

                                    @foreach (\Helper::getExam(0) as $value)

                                    @if($appointment->exam_id == $value->id)
                                    <option value="{{ $value['id'] }}" selected>{{$value->table_name}}</option>
                                    @else
                                    <option value="{{ $value['id'] }}">{{$value->table_name}}</option>
                                    @endif

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="label-style" for="expiration_date">Urgencia</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                                </div>

                                <select name="type" id="type" class="form-control form-control-lg" required>
                                    <option value="0" selected>Inmediata</option>
                                    <option value="1">Programar cita</option>
                                </select>

                            </div>

                        </div>

                        @if($appointment->id)
                        <input type="hidden" name="flag" value="0">
                        @else
                        <input type="hidden" name="flag" value="1">
                        @endif

                        <div class="col-md-6 hidden" style="display:none">

                            <label class="label-style" for="date">Fecha de cita</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('date')"><i
                                            class="fas fa-calendar"></i></span>

                                </div>

                                <input type="date" id="date" name="date" class="form-control form-control-lg"
                                    value="{{$appointment->date}}" min="<?php echo date("Y-m-d");?>">

                            </div>

                        </div>

                        <div class="col-md-6 hidden" style="display:none">

                            <label class="label-style" for="hour">Hora</label>

                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" onclick="getFocus('hour')"><i
                                            class="fas fa-clock"></i></span>

                                </div>

                                <input type="time" id="hour" name="hour" placeholder="hour"
                                    class="form-control form-control-lg" value="{{$appointment->hour}}">

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card-footer">

                    <div class="row">

                        <div class="col-md-6">

                            <a href="{{route('appointment')}}" class="btn btn-block btn-danger float-left cancelar">
                                <i class="fa fa-fw fa-minus"></i> Cancelar
                            </a>

                        </div>

                        <div class="col-md-6">

                            <button id="guardar" type="submit" class="btn btn-block btn-success float-right">
                                <i class="fa fa-fw fa-plus"></i> Guardar
                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </section>

</div>
<script src="{{ asset('js/appointment.js')}}"></script>
@stop