@extends('layout')

@section('contenido')
	
	<h1>Contactos</h1>


	@if( session()->has('info') )
		<h3>{{ session('info') }}</h3>
	@else

	<h2>Escribeme</h2>
	<form method='POST' action="{{ route('mensajes.store') }}">
		@include('messages.formcreate')
	</form>
   @endif
	<hr>
@stop