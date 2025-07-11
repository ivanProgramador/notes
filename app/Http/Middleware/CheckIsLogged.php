<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //antes de ddeixar o usuario passar prra rota principal 
        //eu tenho que testar se a sessão existe porque ela so vai passar a existir 
        //se ele passar pela tela de login 

        if(!session('user')){
            //se asessao não existir ele volta pra tela de login
            
            return redirect('http://localhost/notes/public/login');
        }
        
        
        return $next($request);
    }
}
