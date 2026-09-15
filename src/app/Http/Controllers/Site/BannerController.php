<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BannerController extends Controller{

    public function index(){
    $listaBanner = Banner::orderByDesc('id_banner')
    ->get();
    
    return view('admin.banner.index', compact('listaBanner'));
    }

    //CADASTRAR BANNER
    public function store(Request $request){ 

   
        // 1- VALIDAR OS DADOS
        $dados = $request->validate([
            'titulo_banner' => 'required|max:50',
            'imagem_banner' => 'required|image|mimes:jpg,png,webp,jpeg|max:4096',
            'status_banner' => 'required|in:ATIVO,INATIVO'
        ]);

        $caminhoArquivo = null;

        try{
            DB::beginTransaction();
            // 2- CADASTRAR NO BANCO DE DADOS
            $banner = Banner::create([
                'titulo_banner' => $dados['titulo_banner'],
                //VALOR TEMPORÁRIO
                'imagem_banner' => 'banner/sem-foto.png' , 
                'status_banner' => $dados['status_banner'] 
            ]);

            // 3- RECEBER A IMAGEM ENVIADA PELO FORM
            $imagem = $request->file('imagem_banner');
            
            // 4- CRIAR UM NOME PARA IMAGEM -  Café Mineiro mudar para:cafe_mineiro_7
            
            $tituloImg = Str::slug($dados['titulo_banner']);

            // 5- Pegar a extensão do arquivo
            $extensao = strtolower($imagem->getClientOriginalExtension());

            // 6- CRIAR UM NOME FINAL
            $nomeImg = $tituloImg . '_' . $banner->id_banner . '.' . $extensao; 
            
            // 7- SALVAR ESSA IMAGEM DENTRO DA PASTA DO PROJETO
            $pasta = public_path('barista/assets/banner');

            // 8- SE A PASTA NÃO EXISTIR, FAÇA...
            if(!is_dir($pasta)){
                mkdir($pasta, 0775, true);
            }

            // 9- MOVER E SALVAR A IMG NA PASTA

            $imagem->move($pasta, $nomeImg);

            $caminhoArquivo = $pasta . DIRECTORY_SEPARATOR . $nomeImg;

            // 10- ATUALIZAR O REGISTRO
            $banner->imagem_banner = 'banner/' . $nomeImg;
            $banner->save();

            DB::commit();

            
            // 11- VOLTAR E ENVIAR UMA MENSAGEM
                return redirect()->route('admin.banner.index')->with('Sucesso', 'Banner:' . $banner->titulo_banner . 'cadastrado com sucesso!');
        }catch(\Throwable $erro){
            // desfaz uma ação no banco e dizer o erro
            DB::rollBack();

            // DESFAZER A AÇÃO DE SALVAR A IMAGEM NA PASTA
            if($caminhoArquivo && file_exists($caminhoArquivo)){
                unlink($caminhoArquivo);
            }

            report($erro);

            return redirect()
            ->back()
            ->withInput()
            ->with('erro', 'Não foi possível cadastrar o banner. Tente mais tarde!'); 
            
        }
         
        
    }

}