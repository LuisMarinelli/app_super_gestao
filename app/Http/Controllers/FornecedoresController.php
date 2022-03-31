<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => null,
                'ddd' => '11', // DDD SP
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'ddd' => '85', // DDD CE
                'telefone' => '0000-0001'
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '32', // DDD MG
                'telefone' => '0000-0002'
            ]
        ];

        /*
        //atalho do IF nativo do php (Condicionadores Ternarios)
        echo isset($fornecedores[1]['cnpj']) ? 'CNPJ Informado' : 'CNPJ não informado';

        ou

        $msg = isset($fornecedores[1]['cnpj']) ? 'CNPJ Informado' : 'CNPJ não informado';

        echo $msg;
        
        //teste para desvio do forelse na view
        $fornecedores = [];
        */
        
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
