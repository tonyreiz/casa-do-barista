<?php


namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class HomeController extends Controller{

    //Metodo home - carregar a index(home)
    public function home(){

        return view('site.home.home');
    }

}