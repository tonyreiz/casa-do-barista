<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Galeria;


class CardapioController extends Controller{
    public function cardapio(?int $idCategoria = null){

 $listaGaleria = Galeria ::where('status_galeria', 'ATIVO')->inRandomOrder()->get();
    
        $listaProduto = Produto::with('ProdutoCategoria')
        -> where('status_produto', 'ATIVO')
        ->orderByDesc('id_produto')
        ->get();
        //dd($listaProduto->toArray());

        $listaCategoria = Categoria::where('status_categoria', 'ATIVO')
        ->get();

        //SE NEHUMA CATEGORIA ESTIVER NA URL
        if($idCategoria === null){
            $categoriaSelecionada = $listaCategoria->first();
        }else{
            $categoriaSelecionada = $listaCategoria->firstWhere('id_categoria', $idCategoria);
        }

        // CASO NÃO TENHA A CATEGORIA

        abort_if($categoriaSelecionada === null, 404, 'Categoria não Encontrada');

        $produtos = Produto::query()
        ->where('id_categoria', $categoriaSelecionada->id_categoria)
        ->where('status_produto', 'ATIVO')
        ->orderBy('nome_produto')
        ->get();

        //dd($produtos);


        return view('site.cardapio.cardapio', compact('listaProduto', 'listaCategoria', 'listaGaleria', 'produtos', 'categoriaSelecionada'));
    }
}