
 {!! csrf_field() !!}




	

	@if(auth()->check())

{{-- consejo sabio: no hagas un solo form para varias vistas --}}
			<input class="form-control" type="hidden" name="nombre" value={{ $user->name }}>
			<input class="form-control" type="hidden" name="email" value={{ $user->email }}>

		@else

			<label for="nombre">Nombre</label>
			<input class="form-control" type="text" name="nombre" value="{{ $message->nombre ?? old('nombre') }}">
			{!! $errors->first('nombre', '<span class="error">:message</span>') !!}
			<br>

			<label for="correo">Correo</label>
			<input class="form-control" type="email" name="email" value="{{ $message->email ?? old('email') }}">
			{!! $errors->first('email', '<span class="error">:message</span>') !!}
			<br>
		@endif





		<label for="mensaje">Mensaje</label>
		<textarea class="form-control" name="mensaje" id="mensaje">{{ $message->mensaje ?? old('mensaje') }}</textarea>
		{!! $errors->first('mensaje', '<span class="error">:message</span>') !!}

		<br>

		<input class="btn btn-primary" type="submit" name="">