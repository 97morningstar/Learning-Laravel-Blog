<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesControlles extends Controller
{
	public function __construct(Request $request){
		$this->request = $request;
	//	$this->middleware('example', ['only' => ['home']]); //except NO!!
	}


    public function home(){
    	 return view('home');

    	/*return response('Contenido de la respuesta', 200)
    				->header('X-TOKEN', 'secret')
    				->cookie('X-COOKIE', 'cookie');*/

    }

/*
    public function contacto(){
    	return view('contactos');
    }

    public function mensajes(CreateMessageRequest $request){

    /*	if($this->request->input('nombre') !== null){
    		echo 'Tiene nombre y el nombre es ' . $this->request->input('nombre');
    	}else{
    		echo 'No tiene nombre';
    	}
	*/
    	//Validar formularios en el lado del servidor, buscar en App/Http/Requests/CreatemessageRequests 
    							

 //   	$data = $request->all();

    	// procesar los datos del formulario
    /*	return response()->json([
    		'data' => $data
    	], 202)
    	->header('TOKEN', 'secret');
*/
    	// redireccion (se mantiene en la misma pagina)
    /*	return redirect()
    		->route('contacto')
    		->with('info', 'Tu mensaje ha sido enviado correctamente');   */

    	// redireccion (regresa a la pagina anterior)
//    		return back()->with('info', 'Tu mensaje se ha enviado correctamente');

 //   }

    public function saludo($nombre = "Invitado"){

	$html = "<h2>Contenido html</h2>";
	//loops
	$consolas = [
		"play Station 4", 
		"xbox one",
		"wii u"
	];
    $string_consolas = implode(' + ', $consolas);

	   return view('saludo', compact('nombre', 'string_consolas', 'html'));
	}
}

function hola(){
    
}
