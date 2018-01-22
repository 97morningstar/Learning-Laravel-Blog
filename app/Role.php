<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'display_name'
    ];

    public function user(){
    	return $this->hasMany(User::class); // hasOne(User::class)<-solo se muestra ek 1er usuario que tenga el role ok?
    }


}
