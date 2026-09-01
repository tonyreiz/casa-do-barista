<?php

namespace App\Http\COntrollers\Site;

use App\Http\Controllers\Controller;
use App\Models\Depoimento;

class DepoimentoController extends Controller{

    public function depoimento(){

        $listaDepoimento = Depoimento::orderBydesc('id_depoimento')
        ->get();

        return view('admin.depoimento.index', compact('listaDepoimento'));
    }
}

