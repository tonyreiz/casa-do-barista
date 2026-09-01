<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cliente;

class ClienteController extends Controller{

    public function cliente(){
        $listaCliente = Cliente::orderByDesc('id_cliente')
        ->get();
    return view('admin.cliente.index', compact('listaCliente'));
    }
}

