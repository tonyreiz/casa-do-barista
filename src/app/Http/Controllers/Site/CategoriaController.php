<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categoria;

class CategoriaController extends Controller{

    public function categoria(){

        $listaCategoria = Categoria::orderByDesc('id_categoria')
        ->get();

        return view('admin.categoria.index', compact('listaCategoria'));
    }
}