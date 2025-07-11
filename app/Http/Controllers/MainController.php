<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
   public function index(){
      // carregando as notas do usuario 
      $id = session('user.id');
      $user = User::find($id)->toArray();
      $notes = User::find($id)->notes()->get()->toArray();

      //abaixo a tela vai mostrar dois arrrays 
      // 1 com os dados  do usuario 
      // 2 com as notas que pertencem a ele 

      echo'<pre>';
      print_r($user);
      print_r($notes);
      
      die();
      return view('home');
   }

   public function newNote(){
       echo'criando uma nova nota';
   }
}
