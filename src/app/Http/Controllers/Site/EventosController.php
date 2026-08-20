<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Depoimento;
class EventosController extends Controller{

    public function eventos(){
        $listaDepo = Depoimento::with('DepoimentoCliente')
        ->where('status_depoimento', 'APROVADO')
        ->orderByDesc('id_depoimento')
        ->get();

        return view('site.eventos.eventos', compact('listaDepo'));
    }
}