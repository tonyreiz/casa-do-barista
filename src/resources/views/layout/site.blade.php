<!DOCTYPE html>

<html lang="pt-br">
    
<head>
    // Aqui entra o partial de head
    @include('partials.head')

</head>

<body>
    // Início Cabeçalho
        @include('partials.topo')
    //Main
    <main>
        //area de conteudo
        @yield('content')
    </main>
    //Footer
        @include('partials.rodape')

    //Scripts
        @include('partials.script')
</body>

</html>