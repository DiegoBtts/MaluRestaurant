@extends('plantilla')

@section('content')
<div class="wrapper">
	@include('panel.cabezote')
	@include('panel.menu')
	@yield('content-panel')
</div>

@stop