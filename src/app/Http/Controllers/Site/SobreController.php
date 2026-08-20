<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Depoimento;

class SobreController extends Controller{
    
    
    public function sobre(){

        $listaDepo = Depoimento::with('DepoimentoCliente')
        ->where('status_depoimento', 'APROVADO')
        ->orderByDesc('id_depoimento')
        ->get();
        
        return view('site.sobre.sobre', compact('listaDepo'));
    }
}