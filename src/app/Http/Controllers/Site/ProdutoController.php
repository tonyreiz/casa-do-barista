<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Produto;

class ProdutoController extends Controller{

    public function produto(){

    $listaProduto = Produto::orderByDesc('id_produto')
    ->get();

    return view('admin.produto.index', compact('listaProduto'));
    }
}