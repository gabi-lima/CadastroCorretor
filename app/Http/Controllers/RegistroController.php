<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RegistroController extends Controller
{
    public function atualizarRegistro(Request $request, $id)
   {

        $cpf = $request->input('cpf');
        $creci = $request->input('creci');
        $nome = $request->input('nome');
      // Lógica para validar e atualizar o registro no banco de dados
      DB::table('corretores')
         ->where('id', $id)
         ->update([
            'cpf' => $cpf,
            'creci' => $creci,
            'nome' => $nome,
         ]);

      // Redirecionar de volta à página principal
      return redirect('/');
   }
   public function excluirRegistro($id)
   {
       // Lógica para excluir o registro no banco de dados
       DB::table('corretores')->where('id', $id)->delete();

       // Redirecionar de volta à página principal
       return redirect('/');
   }
}
