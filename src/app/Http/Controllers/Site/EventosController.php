<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class EventosController extends Controller{

    public function eventos(){
        return view('site.eventos.eventos');
    }
}