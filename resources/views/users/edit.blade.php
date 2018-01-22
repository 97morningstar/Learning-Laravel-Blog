@extends('layout')

@section('contenido')



	<h1>Editar Usuario {{ $user->name }}</h1>

	<h2>@if(session()->has('info'))
	{{ session('info') }}

	@endif
	</h2>


<form method='POST' action="{{ route('usuarios.update', $user->id ) }}">
	 {!! method_field('PUT') !!}


		@include('users.form')


		<br>
		<input class="btn btn-primary" type="submit" name="">

	</form>

@stop