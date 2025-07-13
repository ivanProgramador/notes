<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{   

    use SoftDeletes;

    //informando ao model usuario que ela tera muitas notas 
    public function notes(){
         return $this->hasMany(Note::class);
    }

    
}
