<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatosController extends Controller
{
    public function contatos(){

        //var_dump($_POST);

        return view('site.contatos' , ['titulo' => 'Contatos'] );
    }
}
