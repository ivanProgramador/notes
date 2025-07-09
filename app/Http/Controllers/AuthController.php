<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
         return view('login');
    }

    public function loginSubmit(Request $request){
     
      //validando o formulario
      //a validação tona osss dois campos obrigatorios 
      //se um deles vire vazio o validade manda um aviso 
      //pra denrtro da variavel $errors 
      // que sera devolvida para o aruivo do formulario     
      
      $request -> validate(
        [
          'text_username' => 'required',
          'text_password' => 'required'
        ],
        
      );

      echo 'ok';

      echo $request->input('text_username');
      
      echo $request->input('text_password');

    }

    public function logout(){
          echo 'Logout';
    }
}
