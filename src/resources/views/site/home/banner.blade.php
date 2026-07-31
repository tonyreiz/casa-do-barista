  <section class="banner  wow animate__animated animate__fadeInDown ">
  
    <!--COLECTION = Conjunto
    ITEM = Valores -->
    @foreach ($listaBanner as $lista)
      <img src="{{ asset("barista/assets/banner/$lista->imagem_banner") }}" alt="{{ $lista->titulo_banner}}">
          
    @endforeach

    
        
    </section>