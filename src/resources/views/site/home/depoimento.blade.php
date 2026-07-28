     <section class="depoimento  wow animate__animated animate__fadeInDown">
            <header class="parallax-padrao">
                <h2>DEPOIMENTOS</h2>
                <h3>Nada nos inspira mais do que ouvir a experiência de quem passa por aqui
                </h3>
            </header>

            @forelse ($listaDepo as $linha)

            @php
            // garantir queas estrelas fique entre 0 à 5
                $estrela = max(
                    0,
                    min(5, (int) $linha->nota_depoimento)
                );
            //cliente relacionado com depoimento
                $cliente = $linha->depoimentoCliente

                //? = se
                //: = senão
            @endphp            

                            <div class="roleta">
                            <div class="info">
                                <div class="estrela">
                                <ul>
                                    @for ($i = 0; $i <= 5; $i++)
                                        
                                    <li class="{{ $i <= $estrela ? 'estrela-ativa' : 'estrela-inativa'}}">
                                        <img src="{{ asset('barista/assets/Star.png') }}" alt="{{ $i <= $estrela ? 'Estrela preenchida' : 'Estrela não preenchida'}}">
                                    </li>
                                    @endfor
                                   
                                    </ul>
                                </div>

                                <div class="cliente">
                                    <p>{{ $linha->descricao_depoimento}}
                                    </p>

                                    <img src="{{ asset("barista/assets/$cliente->foto_cliente") }}" alt="{{$cliente->nome_cliente}}">

                                    <h4>{{$cliente->nome_cliente}}</h4>
                                    <div>
                                        <h5>Data: {{ $linha->data_criacao_depoimento ? $linha->data_criacao_depoimento->format('d/m/Y') : 'Data não encontrada'}}</h5>
                                        <h5>Café Artesanal</h5>

                                    </div>
                                </div>
                            </div>

                    
                        </div>

            @empty
                
            @endforelse


        </section>