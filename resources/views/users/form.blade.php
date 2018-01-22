	 {!! csrf_field() !!}


		<label for="name">Nombre
			<input class="form-control" type="text" name="name" value="{{ $user->name or old('name')}}">
			{!! $errors->first('name', '<span class="error">:message</span>') !!}
		</label>
		<br>

		<label for="correo">Correo
			<input class="form-control" type="email" name="email" value="{{  $user->email or old('email') }}">
			{!! $errors->first('email', '<span class="error">:message</span>') !!}
		</label>
		<br>


		@unless($user->id)
			<label for="password">Password
				<input class="form-control" type="password" name="password">
				{!! $errors->first('password', '<span class="error">:message</span>') !!}
			</label>

			<br>

			<label for="password_confirmation">Password Confirm
				<input class="form-control" type="password" name="password_confirmation">
				{!! $errors->first('password_confirmation', '<span class="error">:message</span>') !!}
			</label>
			<br>
		@endunless

		<div class="check">
			@foreach($roles as $id => $name)
				<label>
					<input 
						type="checkbox" 
						value="{{ $id }}" 
						{{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
						name="roles[]">
					{{ $name }}
				</label>
			@endforeach
			
		</div>
			{!! $errors->first('roles', '<span class="error">:message</span>') !!}
			<hr>