@extends('layout.site')

@section('content')
        <!-- INÍCIO DA SEÇÃO "BANNER" -->
            @include('site.home.banner')
        <!-- FIM DA SEÇÃO "BANNER" -->
    

        <!-- INÍCIO DA SEÇÃO "BEM-VINDO" -->
            @include('site.home.bemvindo')
        <!-- FIM DA SEÇÃO "BEM-VINDO" -->


        <!-- INÍCIO DA SEÇÃO "DESTAQUE" -->
            @include('site.home.destaque')
        <!-- :FIM DA SEÇÃO "DESTAQUE" -->


        <!-- INÍCIO DA SESSÃO "CARDÁPIO" -->
            @include('site.home.cardapio')
        <!-- FIM DA SEÇÃO "CARDÁPIO" -->


        <!-- COMEÇO DA SEÇÃO "EQUIPE" -->
            @include('site.home.equipe')
        <!-- FIM DA SEÇÃO "EQUIPE"-->


        <!-- INÍCIO DA SEÇÃO "EVENTO" -->
            @include('site.home.evento')
        <!-- FIM DA SEÇÃO "EVENTO" -->


        <!-- INÍCIO DA SEÇÃO "GALERIA" -->
            @include('site.home.galeria')
        <!-- FIM DA SEÇÃO "GALERIA" -->


        <!-- INÍCIO DA SEÇÃO "DEPOIMENTO" -->
            @include('site.home.depoimento')
        <!-- FIM DA SEÇÃO "DEPOIMENTO" -->
@endsection