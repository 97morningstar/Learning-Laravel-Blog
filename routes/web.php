<?php

//esto es solo una prueba de un usuario falso
/*
Route::get('test', function(){
	$user = new App\User;
	$user->name = 'lola';
	$user->email = 'lola@lola.lola';
	$user->password = bcrypt('123123');
	$user->save();

	return $user;
});*/
/*
App\Role::create([
	'name' => 'estudiante',
	'display_name' => 'Solo es un estudiante del sitio',
]);
*/


Route::get('roles', function(){  //funcion inservible
	return \App\Role::with('user')->get();
});

Route::get('/', ['as' => 'home', 'uses' => 'PagesControlles@home']);


//Route::get('contactame', ['as' => 'contacto', 'uses' => 'PagesControlles@contacto']);


//Route::post('contacto', 'PagesControlles@mensajes');

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesControlles@saludo'])->where('nombre', "[A-Za-z\s]+");



/* messagescontroller */


Route::resource('mensajes', 'MessagesController');


//Route::get('usuarios/{id}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit'])->middleware('can:edit');


Route::resource('usuarios', 'UsersController');






/* hasta que entienda lo del resource lo hare como esta aca abajo
Route::get('mensajes', ['as' => 'messages.index', 'uses' => 	'MessagesController@index']);

Route::get('mensajes/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);


Route::post('mensajes', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);


Route::get('mensajes/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);

Route::get('mensajes/{id}/edit', ['as' => 'messages.edit', 'uses' => 'MessagesController@edit']);


Route::put('mensajes/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

Route::delete('mensajes/{id}', ['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy('mensajes.destroy']);

*/

Route::get('login', ['uses' => 'Auth\LoginController@showLoginForm', 'middleware' => 'example', 'cosa' => true, 'otro' => true] );//->middleware('example');

//Route::get('login',  'Auth\LoginController@showLoginForm')->middleware('example:p');


Route::post('login', ['as'  => 'login', 'uses' => 'Auth\LoginController@login']);//->name('login');

Route::get('logout', 'Auth\LoginController@logout');








/*  //Si quieres que el usuario introduzca codigo html, css o js
Route::get('saludos/{nombre}', ['as' => 'saludos', function($nombre = "Invitado"){
	$html = "<h2>Contenido html</h2>";

	return view('saludo', compact('nombre', 'html'));
}])->where('nombre', "[A-Za-z\s]+");




*/

/*

Route::get('/', ['as' => 'home', function () {
    return view('home');
}]);


Route::get('saludos/{nombre?}', ['as' => 'saludos', function($nombre = "Invitado"){
	// return view('saludo', ['nombre' => $nombre]);
	// return view('saludo')->with(['nombre' => $nombre]);

	$html = "<h2>Contenido html</h2>";
	//loops
	$consolas = [
		"play Station 4", 
		"xbox one",
		"wii u"
	];

	   return view('saludo', compact('nombre', 'consolas', 'html'));
}])->where('nombre', "[A-Za-z\s]+");


Route::get('/cosa', function(){
	return "Esta es otra cosa";
});

//ejemplo de parametros obligatorios
Route::get('/hola/{nombre}', function($nombre){
	return "Hola $nombre quien quiera que seas";
});

//ejemplo de parametros no obligatorios
Route::get('/hola/{nombre?}', function($nombre = "Invitado"){
	return "Hola $nombre quien quiera que seas";
});

//validar nombre
Route::get('/hola/{nombre?}', function($nombre = "Invitado"){
	return "Hola $nombre quien quiera que seas";
})->where('nombre', "[A-Za-z]+  ");


/* 
	Route::get('/', function(){
		echo "<a href=". route("contactos") .">Contacto</a><br>";
		echo "<a href=". route("contactos") .">Contacto</a><br>";
		echo "<a href=". route("contactos") .">Contacto</a><br>";
		echo "<a href=". route("contactos") .">Contacto</a><br>";
	});

	Route::get('Contactame', ['as' => 'contactos', function(){
		return "seccion de contactos";
	}])
*/

