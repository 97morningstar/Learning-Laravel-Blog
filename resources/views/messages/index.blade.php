@extends('layout')


@section('contenido')
	<h1>Los mensajes</h1>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Mensajes</th>
				<th>Notas</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@foreach($messages as $message)
				<tr>
					<td>{{ $message->id }}</td>
					<td>
						<a href="{{ route('mensajes.show', $message->id) }}">
						{{ $message->nombre }}</a>
					</td>
						
					<td>{{ $message->email }}</td>
					<td>{{ $message->mensaje }}</td>
					<td>
						
						@if(isset($message) && $message->note)
						 	{{ $message->note->body }}
						@else
							<p>Este mensaje no tiene notas</p>
						@endif
						

					</td>
					<td>
						<a  class="btn btn-info btn-xs" href="{{ route('mensajes.edit', $message->id) }}">
					Editar</a>

					<form  style="display: inline;" method="POST" action="{{ route('mensajes.destroy', $message->id )}}">
						{!! csrf_field() !!}
						{!! method_field('DELETE') !!}
						<button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
						
					</form>


					</td>
				</tr>

			@endforeach
		</tbody>
	</table>




@stop