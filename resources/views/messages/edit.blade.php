@extends('layout')

@section('contenido')


	<h1>Editar mensajes de {{ $message->nombre }}</h1>

<form method='POST' action="{{ route('mensajes.update', $message->id ) }}">
	 {!! method_field('PUT') !!}
	{{-- {!! csrf_field() !!}


		<label for="nombre">Nombre</label>
		<input class="form-control" type="text" name="nombre" value="{{ $message->nombre }}">
		{!! $errors->first('nombre', '<span class="error">:message</span>') !!}
		<br>

		<label for="correo">Correo</label>
		<input class="form-control" type="email" name="email" value="{{  $message->email }}">
		{!! $errors->first('email', '<span class="error">:message</span>') !!}
		<br>

		<label for="mensaje">Mensaje</label>
		<textarea class="form-control" name="mensaje" id="mensaje">{{  $message->mensaje }}</textarea>
		{!! $errors->first('mensaje', '<span class="error">:message</span>') !!}

		<br>

		<input class="btn btn-primary" type="submit" name="">
--}}
@include('messages.formupdate')
	</form>

@stop