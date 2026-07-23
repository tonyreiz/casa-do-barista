  <footer class="rodape">
        <!-- CONTEÚDO PRINCIPAL DO RODAPÉ -->

        <section class="rodape-grid">

            <div class="coluna-end">
                <h3>Nosso Endereço</h3>
                <!-- funciona como p mas é para endereços -->
                <address>
                    Av Marechal Tito,1500 <br>
                    São Miguel Paulista
                </address>
                <a href="{{ route('home') }}">Mapa</a>

            </div>

            <div class="coluna-reserva">

                <div class="box-reserva">
                    <h3>Faça sua Reserva</h3>

                    <div class="linha-box">
                        <hr>
                        <img src="{{ asset('barista/assets/coffee-rodape.svg') }}" alt="Faça sua Reserva">
                        <hr>
                    </div>

                    <ul>
                        <li>Segunda - Sexta <span>09:00-00:00</span></li>
                        <li>Sábado <span>08:00-00:00</span></li>
                        <li>Domingo <span>16:00-00:00</span></li>
                        <li>Feriado <span>16:00-02:00</span></li>
                    </ul>



                    <a href="{{ route('contato') }}" class="botao">Reserva</a>

                </div>


                <div class="box-email">
                    <p>Informe seu email para receber as novidades e promoções da Casa do Barista</p>

                    <!-- action recebe e method-post envia a informação para url -->
                    <!-- action recebe e method-post envia a informação -->
                    <form action="{{ route('home') }}" method="post">
                        <label for="email">Inscreva-se</label>

                        <!-- name=espaço reservado para guardar o nome do usuário -->
                        <!-- id=ajuda para vincular e localizar a infromação no for -->
                        <input type="email" name="email" id="email" placeholder="Informe seu Email">

                        <!-- aria-label=escrita -->
                        <button type="submit" aria-label="Enviar">
                            <img src="{{ asset('barista/assets/arrow.svg') }}" alt="Botão Enviar">
                        </button>
                    </form>
                </div>
            </div>



            <div class="coluna-contato">

                <h3>Contate-nos</h3>
                <a class="link-contato" href="mailto:contato@gmail.com">contato@gmail.com</a>
                <a class="link-contato" href="tel:++11916646938">11916646938</a>

                <div class="redeSocial">

                    <ul>
                        <li><a href="#" target="_blank"><img src="{{asset('barista/assets/facebook-24.png') }}" alt="logo facebook"></a></li>
                        <li><a href="#" target="_blank"><img src="{{ asset('barista/assets/instagram-24.png') }}" alt="logo instagram"></a>
                        </li>
                        <li><a href="#" target="_blank"><img src="{{ asset('barista/assets/whatsapp-24.png') }}" alt="logo whatsApp"></a></li>
                        <li><a href="#" target="_blank"><img src="{{ asset('barista/assets/linkedin-24.png') }}" alt="logo whatsApp"></a></li>
                    </ul>
                </div>
            </div>

        </section>

        <!-- BARRA FINAL -->

        <div class="barra-final">
            <p>@2025-criado e desenvolvido por TIPI06-senac SMP</p>
        </div>
    </footer>