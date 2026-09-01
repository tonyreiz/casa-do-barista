<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;

class NewsController extends Controller{

    public function news(){
        $listaNews = NewsLetter::orderBydesc('id_news')
        ->get();

        return view('admin.newsLetter.index', compact('listaNews'));
    }
}

