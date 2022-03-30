<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return 'Hello Word';
});
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/contatos', 'ContatosController@contatos')->name('site.contatos');
Route::get('/sobre', 'SobreController@sobre')->name('site.sobre');
Route::get('/login', function(){ return 'Pág Login';})->name('site.login');

// prefixo de rotas privadas /app
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){ return 'Pág Clientes';})->name('site.clientes');
    
    //Route::get('/fornecedores', function(){ return 'Pág Fornecedores';})->name('site.fornecedores');
    Route::get('/fornecedores','FornecedoresController@index');
    Route::get('/produtos', function(){ return 'Pág Produtos';})->name('site.produtos');
});

Route::get('/teste/{p1}/{p2}' , 'TesteController@teste')->name('teste');

//redirects 2 métodos
//via return controller
/*
Route::get('/rota1' , function(){
    echo 'Rota 1 ';
})->name('site.rota1');

Route::get('/rota2' , function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');

//via route
//Route::redirect('/rota2', '/rota1');
*/

Route::fallback(function(){
    echo 'Página não Existe. <a href="'.route("site.index").'">Clique aqui</a> para Voltar.';
});

/*
//passagem de parametros definitivos nas rotas
Route::get('/contatos/{nome}/{categoria}/{assunto}/{menssagem}', function (string $nome, string $categoria, string $assunto, string $mensagem) {
    echo "Fomulário: $nome - $categoria - Assunto: $assunto - Mensagem: $mensagem";
});

//passagem de parametros opcionais nas rotas
//Deixar parametros opcionais sempre para ser declada em ultima
Route::get('/contatos/{nome}/{categoria_id}/{assunto?}/{menssagem?}', function (
    string $nome,
    int $categoria_id = 1 // 1 - Informação / 2 - Orçamento
){
    echo "Fomulário: $nome - $categoria_id";

    //expressão regular para atender condição passada 
})->where('nome','[A-Za-z]+')->where('categoria_id','[0-9]+');
*/