<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	
<link rel="stylesheet" type="text/css" href="/css/app.css">

	<title>Mi sitio</title>
</head>
<body>

	<header>

		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Navegacion?</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">

						<li class="{{ activeMenu('/') }}"><a href="{{ route('home') }}">Inicio</a>
							</li>
						

						<li class="{{ activeMenu('saludos*') }}" {{-- deberia proporcionar siempre un dato ya q no hara caso si es blanco --}}><a  
							href="{{ route('saludos', 'Elisa') }}">Saludos</a>
							</li>

						<li class="{{ activeMenu('mensajes/create') }}"><a href="{{ route('mensajes.create') }}">Contactos</a>
							</li>

							

						@if(auth()->check())
							<li class="{{ activeMenu('mensajes') }}" ><a href="{{ route('mensajes.index') }}">Mensajes</a></li>

							@if(auth()->user()->hasRoles(['admin', 'estudiante']))
								<li class="{{ activeMenu('usuarios') }}" ><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
							@endif





							
							
						@endif
 

						

					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						
						@if(auth()->guest())
							<li class="{{ activeMenu('login') }}" ><a
								href="/login">Login</a></li>
						@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->name }} <b class="caret"></b></a>
							<ul class="dropdown-menu">
								
								<li><a href="/usuarios/{{ auth()->id() }}/edit">Mi Cuenta</a></li>
								<li><a href="/logout">Cerrar Sesion</a></li>
							</ul>
						</li> 

						@endif




					

					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>


<?php function activeMenu($url){
		return request()->is($url) ? 'active' : '';
	}?>

	



	</header>

	<div class="container">
	{{--	<h1>{{ request()->url() }}</h1>  --}}
		<h2>{{ request()->is('/') ? 'Estas en el home' : 'No estas en el home' }}</h2>

		@yield('contenido')

		<footer>Copyright {{ date('Y') }}</footer>
	</div>

	{{--<script type="text/javascript" src="/js/jquery.js"></script>--}}
	<script type="text/javascript" src="/js/app.js"></script>


</body>
</html>