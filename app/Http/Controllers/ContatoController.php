<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        //var_dump($_POST);        
        //dd($request);
        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';

        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        echo '<br>';
        */

        $contato = new SiteContato();
        /*
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        $contato->save();
        

        $contato->fill($request->all());
        //print_r($contato->getAttributes());
        $contato->create($request->all());
*/
        return view('site.contato', ['titulo' => 'Contato (teste)']);
    }

    public function salvar(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required',
                'telefone' => 'required',
                'email' => 'required',
                'motivo_contato' => 'required',
                'mensagem' => 'required',
            ]
        );

        //realizar validação de dados recebidos no request
        //SiteContato::create($request->all());


    }
}
