<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class FormularioController extends Controller
{
    public function processarFormulario(Request $request)
    {
        // Obter dados do formulário
        $cpf = $request->input('cpf');
        $creci = $request->input('creci');
        $nome = $request->input('nome');

        // Inserir dados no banco de dados
        DB::table('corretores')->insert([
            'cpf' => $cpf,
            'creci' => $creci,
            'nome' => $nome,
        ]);


        return redirect('/');
    }
}
