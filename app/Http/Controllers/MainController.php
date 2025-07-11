<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
   public function index(){
      
      $id = session('user.id');
      $notes = User::find($id)->notes()->get()->toArray();

      return view('home',['notes' => $notes]);
   }

   public function editNote($id){
       
   }

    public function deleteNote($id){
       
   }

   public function newNote(){
       echo'criando uma nova nota';
   }
}
