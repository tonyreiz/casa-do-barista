<!--INÍCIO CABEÇARIO -->
<header class="topo" id="topoFixo">

    <h1>Casa do Barista</h1>



    <button class="abrir-menu"></button>
    <nav class="menu">
        <button class="fechar-menu"></button>
      
        <div class="linha">

            <ul>

                <li>
                    <a class="menu-ativo" href="{{route('home') }}">Home</a>
                </li>
                <li><a class="" href="{{ route('sobre') }}">Sobre</a></li>
                <li><a class="" href="{{ route('cardapio') }}">Cardápio</a></li>
                <li><a class="" href="{{ route('eventos' ) }}">Eventos</a></li>
                <li><a class="" href="{{ route('contato') }}">Contato</a></li>



            </ul>
            <!-- LOGIN -->



            <div class="login">

                <a href="#" target="_blank" rel="noopener noreferrer"><img src="assets/login.png" alt="LOGIN"></a>
            </div>


            <ul class="redeSocial">
                <li><a href="#" target="_blank"><img src="{{ asset('barista/assets/facebook-24.png' ) }}" alt="logo facebook"></a></li>
                <li><a href="#" target="_blank"><img src="{{ asset('barista/assets/instagram-24.png') }}" alt="logo instagram"></a></li>
                <li><a href="#" target="_blank"><img src="{{ asset('barista/assets/whatsapp-24.png') }}" alt="logo whatsApp"></a></li>
            </ul>

        </div>


    </nav>
</header>
<!-- FIM CABEÇARIO -->