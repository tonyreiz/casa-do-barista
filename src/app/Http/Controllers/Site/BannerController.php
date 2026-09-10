<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller{

    public function index(){
    $listaBanner = Banner::orderByDesc('id_banner')
    ->get();
    
    return view('admin.banner.index', compact('listaBanner'));
    }

    //CADASTRAR BANNER
    public function store(Request $request){

        // 1- VALIDAR OS DADOS
        $request->validate([
            'titulo_banner' => 'required|max:50',
            'imagem_banner' => 'required|assets',
            'status_banner' => 'required'
        ]);
        dd($request);
        // 2- RECEBER A IMAGEM ENVIADA PELO FORM
        $imagem = $request->file('img_banner');
        
        // 3- CRIAR UM NOME PARA IMAGEM
        $titulo = $request->titulo_banner;
        $nomeImg = time() . '_' . $imagem->getClientOriginalName();
        
        // 4- SALVAR ESSA IMAGEM DENTRO DA PASTA DO PROJETO
        $imagem->move(public_path('barista/assets/banner'), $nomeImg);
        
        // 5- CADASTRAR NO BANCO DE DADOS
        Banner::create([
            'titulo_banner' => $request->titulo_banner,
            'imagem_banner' => 'banner/' . $nomeImg,
            'status_banner' => $request->status_banner
        ]);
        // 6- VOLTAR E ENVIAR UMA MENSAGEM
            return redirect()->route('admin.banner.index')->with('Sucesso', 'Banner cadastrado com sucesso!');
    }

}