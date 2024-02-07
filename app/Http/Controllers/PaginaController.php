<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function exibirPagina()
    {
        // Obter os dados da tabela
        $dadosTabela = DB::table('corretores')->get();

        // Retornar a view com os dados da tabela
        return view('testetecnico')->with('dadosTabela', $dadosTabela);
    }
}
