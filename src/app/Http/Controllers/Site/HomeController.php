<?php


namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Depoimento;
use App\Models\Galeria;
use App\Models\Categoria;

class HomeController extends Controller{

    //Metodo home - carregar a index(home)
    public function home(){

        
        //BUSQUE A LSITA DE BANNER PARA EXIBIR NA HOME(VIEWS)

        // :: = pega algum recurso
        //get() = pega todas os valores/variável

        $listaBanner = Banner::where('status_banner', 'ATIVO')->inRandomOrder()->get();
        //dd($listaBanner);
        

        // BUSCAR DEPOIMENTOS APROVADO JUNTOS COM OS DADOS DOS CLIENTE

        $listaDepo = Depoimento::with('DepoimentoCliente')
        ->where('status_depoimento', 'APROVADO')
        ->orderByDesc('id_depoimento')
        ->get();

        //dd($listaDepo->toArray());

        //BUSCAR IMAGENS DA TABELA GALERIA

        $listaGaleria = Galeria ::where('status_galeria', 'ATIVO')->inRandomOrder()->get();
        //dd($listaGaleria);

        

        //Carrega a view
        //OBS: Se itens mais tabelas, adicione ',' no compact e adicone as outras tabelas
        return view('site.home.home', compact('listaBanner', 'listaDepo', 'listaGaleria'));
    }

}