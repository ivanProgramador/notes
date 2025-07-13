<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;


//essas rotas são para usuarios que não tem cessão 

Route::middleware([CheckIsNotLogged::class])->group(function(){

    //Rota de autenticação 
    Route::get('/login',[AuthController::class,'login']);

   //essa rota vai receber os dados quando o usuario acionar o submit 
   Route::post('/loginSubmit',[AuthController::class,'loginSubmit']);

});



//Aqui eu crio uma rota do tipo middleware, para que a função de middleware
//que eu criei faça a checagem do login/ proteção das rotas eu tenho que agrupa-las 
// detro dela então todas vez quen usuario tentar entrar em qualquer dessas rotas do grupo
//vai ser testado se exsite uma sessão que permita esse acesso  

Route::middleware([CheckIsLogged::class])->group(function(){

            //rota da home page 
            Route::get('/',[MainController::class,'index'])->name('home');

            //rota de formulario de edição
            Route::get('/editNote/{id}',[MainController::class,'edit'])->name('edit');

             //rota de apagar a nota 
            Route::get('/deleteNote/{id}',[MainController::class,'deleteNote'])->name('deleteNote');
            
            //rota da nova nota
            Route::get('/newNote',[MainController::class,'newNote'])->name('new');

            //rota para submeter uma nova nota
            Route::post('/newNoteSubmit',[MainController::class,'newNoteSubmit'])->name('newNoteSubmit'); 

            //logout
            Route::get('/logout',[AuthController::class,'logout'])->name('logout');

});



