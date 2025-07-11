<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsNotLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next): Response
    {

        //um usuário que ja esta logado não dev ter acesso a tela de login
        //então eu vou verificar se ja existe uma sessãao com esse usuario 
        //se sim eu não vou deixar ele acessar a tela de login 
        
        
        if(session('user')){

            //se asessao jaa existir ele não vai conseguir aacessar a apgina de login novamente 
                        
            return redirect('http://localhost/notes/public/');
        }
        

        return $next($request);
    }
}
