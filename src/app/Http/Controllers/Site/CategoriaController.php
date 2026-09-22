<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriaController extends Controller{

    public function categoria(){

        $listaCategoria = Categoria::orderByDesc('id_categoria')
        ->get();

        return view('admin.categoria.index', compact('listaCategoria'));
    }

    //CADASTRAR CATEGORIA

    public function store(Request $request){

        //VALIDAR DADOS
        
        $dados = $request->validate([
            'nome_categoria' => 'required|max:50',
            'status_categoria' => 'required|in:ATIVO,INATIVO'
        ]);
        try {
            DB::beginTransaction();
            // CADASTRAR NO BANCO
            
            $categoria = Categoria::create([
                'nome_categoria' => $dados['nome_categoria'],
                'status_banner' => $dados['status_categoria']
            ]);
            
            return redirect()->route('admin.categoria.index')->with('sucesso', 'Banner:'. $categoria->nome_categoria . ' cadastrada com sucesso!');
        } catch (\Throwable $erro) {
            
            DB::rollBack();
            
            report($erro);
            
            return redirect()
            ->back()
            ->withInput()
            ->with('erro', 'erro ao cadastrar a categoria, tente mais tarde');
            
        }
    }

    // ATUALIZAR A CATEGORIA

    public function update(Request $request,  int $id){
        $dados = $request->validate([
            'nome_categoria' => 'required|max:50',
            'status_categoria' => 'required|in:ATIVO,INATIVO'
        ]);

        // BUSCAR A CATEGORIA

        $categoria = Categoria::findOrFail($id);

        try {
            $nomeSlug = Str::slug($dados['nome_categoria']);

            $categoria->update([
                'nome_categoria' => $dados['nome_categoria'],
                'status_categoria' => $dados['status_categoria']
            ]);

            //ENIVAR A MENSAGEM

            return redirect()->route('admin.categoria.index')->with('sucesso', 'categoria: ' . $categoria->nome_categoria . ' atualizada com sucesso');
        } catch (\Throwable $erro) {
            
            report($erro);

            return redirect()
            ->back()
            ->with('erro', 'erro em atualizar a categoria, tente mais tarde');
        }
    }


    // ATIVAR E DESATIVAR CATEGORIA

    public function status(Request $request, int $id){

        try {
            $categoria = Categoria::findOrFail($id);

            $novoStatus = $categoria->status_categoria === 'ATIVO' ? 'INATIVO' : 'ATIVO';

            // ATUALIZAR A CATEGORIA

            $categoria->update([
                'status_categoria' => $novoStatus
            ]);

            $mensagem = $novoStatus === 'ATIVO' ? 'Categoria ativada com sucesso' : 'Categoria desativada com sucesso';

            //ENIVAR A MENSAGEM

            return redirect()->route('admin.categoria.index')->with('sucesso', $mensagem);

        } catch (\Throwable $erro) {
            report($erro);

            return redirect()
            ->back()
            ->with('erro', 'não foi possível alterar o status da categoria, tente mais tarde');
        }
    }
}