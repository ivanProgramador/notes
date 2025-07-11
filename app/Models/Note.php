<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    //informando a nota que la pertence a um usuario
    public function user(){

          return $this->belongsTo(User::class);
    }
}
