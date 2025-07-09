<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

        //regras 
        [
          'text_username' => 'required|email',
          'text_password' => 'required|min:6|max:16'
        ],
        //avisos de erro 
        [
          'text_username.required'=>'O nome do usuário é obrigatório',
          'text_username.email'=>'o nome de usuário deve ser um email valido',
          'text_password.required'=>'A senha é obrigatória',
          'text_password.min'=>'A senha deve ter pelo menos :min caracteres',
          'text_password.max'=>'A senha deve ter pelo menos :max caracteres'
        ]
        
      );

      echo 'ok';

      echo $request->input('text_username');
      
      echo $request->input('text_password');


      

    }

    public function logout(){
          echo 'Logout';
    }
}
