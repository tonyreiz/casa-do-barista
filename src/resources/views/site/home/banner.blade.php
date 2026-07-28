  <section class="banner  wow animate__animated animate__fadeInDown ">
  
    <!--COLECTION = Conjunto
    ITEM = Valores -->
    @foreach ($listaBanner as $linha)
      <img src="{{ asset("barista/assets$linha->imagem_banner") }}" alt="{{ $linha->titulo_banner}}">
          
    @endforeach

    
        
    </section>