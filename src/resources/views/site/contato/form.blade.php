          <!-- form -->
                <div class="contato-form">
                    <h3>Formul&aacute;rio de contato</h3>
                    <form action="#" method="post">
                        <div class="form-linha">
                            <input type="text" name="nome" placeholder="NOME COMPLETO" required>
                        </div>

                        <div class="form-linha">
                            <input type="email" name="email" placeholder="E-MAIL" required>
                        </div>

                        <div class="form-linha form-dupla">
                            <div class="campo-metade">
                                <input type="tel" name="fone" placeholder="TELEFONE">
                            </div>

                            <div class="campo-metade">
                                <select name="assunto" required>
                                    <option value="" disabled selected>ASSUNTO</option>
                                    <option value="Eventos">Eventos</option>
                                    <option value="Café">Café</option>
                                </select>
                            </div>

                        </div>



                        <div class="form-linha">
                            <textarea name="mens" cols="30" rows="10" placeholder="MENSAGEM" required></textarea>
                        </div>

                        <div class="form-linha form-acoes">
                            <button type="submit">Enviar Mensagem</button>
                            <button type="reset">Limpar</button>
                        </div>
                    </form>
                </div>
