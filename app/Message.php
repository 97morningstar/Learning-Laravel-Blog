<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // laravel busca en automatico una tabla en minusculas y en plural
	// Si quieres una tabla con tu propio nombre:
	// protected $table = 'nombre_de_mi_tabla'; 7n7


	protected $fillable = ['nombre', 'email', 'mensaje'];

     public function user(){

        return $this->belongsToMany(User::class, 'user_id'); 
        /* //buscar mas adelante    $this->belongsTo(//Role::class);*/
    }

    public function note(){
    	return $this->morphOne(Note::class, 'notable');
    }

}
