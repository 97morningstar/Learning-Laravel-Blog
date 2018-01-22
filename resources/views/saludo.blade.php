@extends('layout')

@section('contenido')
	<h1>Saludo a {{ $nombre }}</h1>

	<h2>Estas son las consolas</h2>
	<p>{{ $string_consolas }}</p>


@stop