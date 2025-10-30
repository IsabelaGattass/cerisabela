<p style="margin-left: 430px; font-size:50px;">CONTATO</p>
<h2></h2>
<div class="texto">
    
    <div>
        <p style="font-size: 25px">Email: contato@cerisabela.com</p>
         <p style="font-size: 25px">Telefone: (99) 99999-9999</p>
         <p style="font-size: 25px">WhatsApp: (99) 99999-9999</p>
         <p style="font-size: 25px">Endereço: Rua Fictícia, 123, Bairro, Cidade, Estado</p>
         <p style="font-size: 25px">Redes sociais:
            <a href="https://facebook.com/cerisabela" target="_blank">Facebook</a> 
            <a href="https://instagram.com/cerisabela" target="_blank">Instagram</a>
        </p>
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#formModal">
            Fale Conosco
        </button>
    </div>
</div>




<!-- Modal com o formulário -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Formulário de Contato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="processar_formulario.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensagem" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="mensagem" name="mensagem" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="assunto" class="form-label">Assunto</label>
                        <select class="form-control" id="assunto" name="assunto" required>
                            <option value="">Escolha o tipo de dúvida</option>
                            <option value="dúvida">Dúvida</option>
                            <option value="suporte">Suporte</option>
                            <option value="orcamento">Orçamento</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="horario" class="form-label">Horário de Atendimento</label>
                        <input type="text" class="form-control" id="horario" value="Segunda a Sexta, das 9h às 18h" disabled>
                    </div>

                    <!-- Política de privacidade com checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="politica" name="politica" required>
                        <label class="form-check-label" for="politica">
                            Eu li e aceito a <a href="#" data-bs-toggle="modal" data-bs-target="#politicaModal">Política de Privacidade</a>.
                        </label>
                    </div>

                    <!-- Botão de envio -->
                    <button type="submit" class="btn btn-primary mt-3">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal da Política de Privacidade -->
<div class="modal fade" id="politicaModal" tabindex="-1" aria-labelledby="politicaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="politicaModalLabel">Política de Privacidade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Política de Privacidade - Exemplo</h6>
                <p>Aqui, você explica como os dados dos usuários serão coletados, armazenados e usados, além de assegurar que a privacidade será respeitada.</p>
                <p>Você pode incluir informações sobre o uso de cookies, compartilhamento de dados e a conformidade com as regulamentações de privacidade, como a LGPD.</p>
            </div>
        </div>
    </div>
</div>
<!-- Finalizamos o main -->