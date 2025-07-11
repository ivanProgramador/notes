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
     
       
      
      $request -> validate(

      
        [
          'text_username' => 'required|email',
          'text_password' => 'required|min:0|max:16'
          
        ],
      
        [
          'text_username.required'=>'O nome do usuário é obrigatório',
          'text_username.email'=>'o nome de usuário deve ser um email valido',
          'text_password.required'=>'A senha é obrigatória',
          'text_password.min'=>'A senha deve ter pelo menos :min caracteres',
          'text_password.max'=>'A senha deve ter pelo menos :max caracteres'
        ]
        
      );

     
      
      $username = $request->input('text_username');
      $userpassword = $request->input('text_password');
      
      //verificando se o usuario existe

      $user = User::where('username', $username)
                    ->where('deleted_at',null)
                    ->first();

      if(!$user){
        return redirect()->back()->withInput()->with('loginError', 'Login ou senha invalidos');

      }

      //verificando a senha 

      if(!password_verify($userpassword ,$user->password)){
         return redirect()->
                back()->
                withInput()->
                with('loginError', 'Login ou senha invalidos');
      }

      




      echo'<pre>';
      print_r($user);

    }

    public function logout(){
          echo 'Logout';
    }
}
