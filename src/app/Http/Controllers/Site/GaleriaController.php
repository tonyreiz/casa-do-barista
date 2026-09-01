<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Galeria;

class GaleriaController extends Controller{

    public function galeria(){

    $listaGaleria = Galeria::orderByDesc('id_galeria')
    ->get();

    return view('admin.galeria.index', compact('listaGaleria'));
    }
}