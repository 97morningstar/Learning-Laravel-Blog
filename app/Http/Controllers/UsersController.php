<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;


use Illuminate\Http\Request;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateUserRequest;




class UsersController extends Controller
{

    function __construct(){
        $this->middleware('auth', ['except' => 'show']);
        $this->middleware('roles:admin', ['except' => ['edit', 'update', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = \App\User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $roles = Role::pluck('display_name', 'id');

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {

        $user = User::create( $request->all() );
         dd($request->roles);
        $user->roles()->attach($request->roles);
       

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //esto si quiero que todos los usuarios sean visibles por todos sin necesidad de hacer login

            $user = User::findOrFail($id);
            return view('users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $authUser = auth()->user();
       
         $this->authorize('edit', $user);
     
         $roles = Role::pluck('display_name', 'id');

       return view('users.edit', compact('user', 'roles')); 
 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //return $request->all();


         $user = User::findOrFail($id);

         $this->authorize('update', $user);


        $user->update($request->only('name', 'email', 'roles'));

       // dd($user->roles());
        $user->roles()->sync($request->roles);

        // Redirecionamos hacia atras (pero no me gusta mucho)
        return back()->with('info', 'Hemos actualizado este usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
      $message = User::findOrFail($id);

      $user = User::findOrFail($id);
      $this->authorize('destroy', $user);
 
        $message->delete();

        // Redireccionar
     return redirect()->route('usuarios.index');

    }
}
