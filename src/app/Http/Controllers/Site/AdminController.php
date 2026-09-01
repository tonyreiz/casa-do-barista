<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;

class AdminController extends Controller{
    public function dash(){
        $qtdeCliente = Cliente::where('status_cliente', 'ATIVO')->count();
        $qtdeProdutos = Produto::where('status_produto', 'ATIVO')->count();
        $qtdeProdutosDestaque = Produto::where('destaque_produto', 1)->count();
        $valorTotalVendas = Venda::where('status_venda', 'FINALIZADA')->sum('valor_total_venda');
        
        return view('admin.dashboard' , compact('qtdeCliente', 'qtdeProdutos', 'qtdeProdutosDestaque', 'valorTotalVendas'));
    }

}