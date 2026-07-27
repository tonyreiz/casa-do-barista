<?php


namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class HomeController extends Controller{

    //Metodo home - carregar a index(home)
    public function home(){

        
        //BUSQUE A LSITA DE BANNER PARA EXIBIR NA HOME(VIEWS)

        // :: = pega algum recurso
        //get() = pega todas os valores/variável

        $listaBanner = Banner::where('status_banner', 'ATIVO')->inRandomOrder()->get();

        //retorna as variáveis
        //dd($listaBanner);

        //Carrega a view
        //OBS: Se itens mais tabelas, adicione ',' no compact e adicone as outras tabelas
        return view('site.home.home', compact('listaBanner'));
    }

}