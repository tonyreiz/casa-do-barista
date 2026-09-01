<?php 

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Venda;

class VendaController extends Controller{

    public function venda(){

    $listaVenda = Venda::orderByDesc('id_venda')
    ->get();
    return view('admin.venda.index', compact('listaVenda'));
    }
}