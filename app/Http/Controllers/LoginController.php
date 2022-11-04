<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.login', [
            'titulo' => 'Login'
        ]);
    }

    public function autenticar(Request $request)
    {

        //regras para validar campos
        $regras = [
            'usuario' => 'required | email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'Insira um e-mail válido!',
            'senha.required' => 'O campo :Attribute é Obrigatório!',

            'required' => 'O campo :Attribute é obrigatório!'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');
        /*
        echo "Usuário: $email </br>"; 
        echo "Senha: $password </br>"; 
        */
        
        //iniciando Model User
        $user = new User();

        $certifica = $user->where('email', $email)->where('password', $password)->get();
    }
}
