@extends('layout')

@section('contenido')
	<h1>Crear nuevo usuario</h1>


	<form method='POST' action="{{ route('usuarios.store') }}">


		@include('users.form', ['user' => new App\User])


		<br>
		<input class="btn btn-primary" type="submit" name="" value="Save">

	</form>


@endsection