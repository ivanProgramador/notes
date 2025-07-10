<?php

namespace App\Http\Controllers;

use App\Models\User;
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

      // na primeira fase eu verificou se o usuario existe
      
      $username = $request->input('txt_username');
      $username = $request->input('txt_password');
      
      // aqui eu uso um metodo estatico da classe  User que repesenta o meu model 
      // o metodo where recebe 2 parametros e faz a comparação 
      //entre o campo 'username' e o valor da variavel que veio do imput $username   
      // aveirficação aqui pass por 2 fases 
      //primeiro eu comparo se o usuario informado existe e depois eu verifico se o camo deleted_at
      //tem algum valor, se tiver eu não posso deixar passar   
      // por ultimo eu vaiso que eu qero o primiero valor 

      $user = User::where('username',$username)
                    ->where('deleted_at',null) 
                    ->first(); 

      //se nenhum usuario for encontrado o usar sera vazio então eu tenho que 
      //volta apra tela de lohgin e explicxar oque houve               
      if(!$user){
          //aqui eu usao um conjunto de funções para fazer isso 
          
          return redirect()->back()->withInput()->with('loginError',' senha ou usuario invalido !');
      }

      





    





      

    }

    public function logout(){
          echo 'Logout';
    }
}
