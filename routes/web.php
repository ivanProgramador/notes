<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Main;
use Illuminate\Support\Facades\Route;

//Rota de autenticação 
Route::get('/login',[AuthController::class,'login']);

//essa rota vai receber os dados quando o usuariio acionar o submit 
Route::post('/loginSubmit',[AuthController::class,'loginSubmit']);

Route::get('/logout',[AuthController::class,'logout']);
