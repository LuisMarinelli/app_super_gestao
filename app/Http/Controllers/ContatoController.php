<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

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

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        //realizar validação de dados recebidos no request

        $regras =  [
            /*
                ** TESTE para caso o campo tenha que ser único, sintaxe:
                ' [...] | unique: <nome_tabela> ',
            */
            'nome' => 'required | min:3 | max:40 ',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required | max: 220',

        ];

        $feedback = [
            'nome.min' => 'O campo Nome precisa ser maior que 3 caractéres',
            'nome.max' => 'O campo Nome precisa ser menor que 40 caractéres',
            'telefone.required' => 'O campo Telefone é Obrigatório',
            'email.email' => 'O campo Email precisa ser válido',
            'motivo_contatos_id.required' => 'O campo Motivo deve ser escolhido',
            //'mensagem.required' => 'O campo Mensagem deve ser preenchido',
            'mensagem.max' => 'O campo Mensagem precisa ser menor que 220 caractéres',
            //Mensagem default para algum outro campo, exemplo 'required'
            'required' => 'O campo :Attribute é obrigatório'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
