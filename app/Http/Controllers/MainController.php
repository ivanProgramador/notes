<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
   public function index(){
       echo'dentro do app';
   }

   public function newNote(){
       echo'criando uma nova nota';
   }
}
