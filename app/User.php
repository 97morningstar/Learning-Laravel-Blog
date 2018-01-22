<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Note;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'  //no poner role aca, solo un ejemplo
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //una forma de modificar un atributo cada vez q se guarde en la base de datos automaticamente
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

//Relaciones
    public function roles(){

        return $this->belongsToMany(Role::class, 'assigned_roles'); 
        /* //buscar mas adelante    $this->belongsTo(//Role::class);*/
    }

    public function messages(){
    //    dd($this->hasMany(Message::class));
        return $this->hasMany(Message::class);
    }




    // Este metodo para verificar si el usuario tiene algun role asignado en la tabla
    public function hasRoles(array $roles){


         return (bool) $this->roles->pluck('name')->intersect($roles)->count();



       //dd($this->roles);

      /*  foreach ($roles as $role) {

          foreach ($this->roles as $userRole) {        // jaja me quede un poco botada pero no es dificil de entender, quiza mas adelante
               if($userRole->name === $role){
                    return true;
               }
            }

        }*/
       return false;
    }

    public function isAdmin(){
        return $this->hasRoles(['admin']);
    }

    public function note(){
        return $this->morphOne(Note::class, 'notable');
    }




}
