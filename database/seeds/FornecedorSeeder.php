<?php

use Illuminate\Database\Seeder;
use \App\Fornecedor;
/* fazer este use para acessar o metodo insert */
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o ojeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'www.fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';

        $fornecedor->save();

        //utilizando o metodo o create (atenção ao atributo fileable)
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'www.fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        //terceiro metodo insert (literalmente uma query)
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'www.fornecedor300.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor300.com.br'
        ]);
    }
}
