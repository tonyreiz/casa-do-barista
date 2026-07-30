@extends('layout.site')

@section('content')

          <section class="cardapio  wow animate__animated animate__fadeInDown">

            <header class="parallax-padrao">
            <h2>Cardápio | {{$categoriaSelecionada->nome_categoria}}</h2>
               <nav>
                    <ul>
                        @foreach($listaProduto as $linha)

                        <li >
                            <a href="{{ route('cardapio.categoria', $linha->id_categoria)}}">{{$linha->nome_categoria}}</a>
                        </li>
                            
                        @endforeach
                    </ul>
               </nav>
            </header>

            <div class="produto">


                @foreach ($produtos as $linha)
                
                <div class="card-flip">

                    <article class="card-flip-miolo">


                        <div class="flip1">
                            <h4>{{$linha->nome_produto}}</h4>
                        </div>
                        <!-- <img src="assets/croissant.jpg" alt="imagem do produto"> -->

                        <div class="flip2">
                            <h4> {{$linha->nome_produto}} <span>{{number_format($linha->valor_produto, 2,',', '.')}}</span></h4>
                            <h5>{{$linha->descricao_curta_produto}}</h5>
                        </div>



                    </article>
                </div>
                @endforeach

         
            </div>


            <div class="class-botao">
                <button class="botao">Veja Mais</button>
            </div>

        </section>

@endsection