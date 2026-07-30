     <section class="galeria  wow animate__animated animate__fadeInDown">
            <header class="parallax-padrao">
                <h2>Galeria</h2>
                <h3>Momentos que traduzem nosso propósito
                </h3>
            </header>

            <div class="item">
                @foreach ($listaGaleria as $lista)
    
                    <img src="{{ asset("barista/assets/$lista->imagem_galeria") }}" alt="{{$lista->nome_galeria}}">

                @endforeach
            </div>
    
        </section>