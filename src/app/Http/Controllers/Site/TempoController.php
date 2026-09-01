<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Tempo;

class TempoController extends Controller{

    public function tempo(){

        $listaTempo = Tempo::orderByDesc('id_linha_tempo')
        ->get();
        return view('admin.tempo.index', compact('listaTempo'));
    }
}