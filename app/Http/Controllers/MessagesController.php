<?php

namespace App\Http\Controllers;

use DB;

use App\Message;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{

    function __construct(){
        $this->middleware('auth' , ['except' => ['create', 'store']]);
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $messages = DB::table('messages')->get();

       $messages = Message::all();





        return view('messages.index', compact('messages'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

     if(auth()->check()){

            return view('messages.create')->with('user', auth()->user());
       }

        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMessageRequest $request)
    {
        //Guardar el mensaje con la clase DB

    /*    DB::table('messages')->insert([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),

        ]);         */     

        // Guardar mensajes en la base de datos con Eloquent

     /*   $message = new Message;
        $message->nombre = $request->input('nombre');
        $message->email = $request->input('email');
        $message->mensaje = $request->input('mensaje');
        $message->save();           */

        // Utilizando el metodo create directamente en el modelo, le puede pasar por parametro un array como el del DB::table o asi-: (investigar sobre esto porque puede ser inseguro, asignacion masiva de datos)

 //dd("si");
       $message = Message::create($request->all());

       if(auth()->check()){

            auth()->user()->messages()->save($message);
       }

        // Redireccionar

        return view('messages.create', compact('message'))->with(['info' => 'Hemos recibido tu mensaje yeeei', 'message' => $message, 'user' => auth()->user()]);



     //  return back()->with('info', 'Tu mensaje se ha enviado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Guardar el mensaje con la clase DB

    /*   $message = DB::table('messages')->where('id', $id)->first();   */

       // Guardar mensajes en la base de datos con Eloquent

    $message = Message::findOrFail($id);

       return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
             //Guardar el mensaje con la clase DB

    /*    $message = DB::table('messages')->where('id', $id)->first();  */

        // Guardar mensajes en la base de datos con Eloquent

        $message = Message::findOrFail($id);

        if(auth()->check()){
            return view('messages.edit')->with(['user' => auth()->user(), 'message' => $message]);
       }

        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

             // Actualizar el mensaje con la clase DB

        // Actualizamos
   /*     $message = DB::table('messages')->where('id', $id)->update([
             "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "updated_at" => Carbon::now(),
        ]);       */


        // Actualizar con Eloquent

        $message = Message::findOrFail($id);

        $message->update($request->all());

        // Redirecionamos
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminiar mensaje con la clase BD
      /*   DB::table('messages')->where('id', $id)->delete();     */

      $message = Message::findOrFail($id);
 
        $message->delete();

        // Redireccionar
     return redirect()->route('mensajes.index');

      
    } 
}
