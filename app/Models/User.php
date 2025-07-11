<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{   

    //informando ao model usuario que ela tera muitas notas 
    public function notes(){
         return $this->hasMany(Note::class);
    }

    
}
