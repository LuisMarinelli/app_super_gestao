<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {

        if ($metodo_autenticacao == 'padrao') {
            echo 'Verificar usuário no BD, perfil: ' . $perfil . '<br>';
        } else if ($metodo_autenticacao == 'ldap') {
            echo 'Verificar usuário no AD, perfil: ' . $perfil . '<br>';
        }

        if ($perfil == 'visitante') {
            echo 'Liberado alguns recursos </br>';
        } else {
            echo 'liberado todos os recursos. </br>';
        }

        //simulando uma autenticação de login
        if (false) {
            return $next($request);
        } else {
            return Response('Acesso Negado! Rota exige Autenticação.');
        }
    }
}
