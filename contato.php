
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/baseSite.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Cerisabela - Esmaltes</title>
</head>

<body>
    <!-- nosso cabeçalho -->
    <header>
        <img src="images/logo.png" alt="Logo da Empresa">
        <div class="empresa">
            <h1>CERISABELA</h1>
            <p>Especializada em Unhas</p>
        </div>
    </header>

    <!-- menu de navegação -->

     <nav class="navbar navbar-expand-lg nav-custom">
  <div class="container-fluid">

    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="sobre">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="serviços">Ativiades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="estrutura">Nossa Estrutura</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contato">Contato</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

   

    <main>
        <div class="dest">
            Qualidade e Capacidade em Unhas!
        </div>

        <section id="sobre">
            <h2>Sobre Nós</h2>
            <div class="texto">
                <img src="images/sobreNos.png" alt="Sobre a empresa">
                <p>Somos uma empresa referência nas unhas, com muitas opções de esmaltes, diversas cores e tipos, utilizando práticas robustas e desenvolvimentos de excelência.</p>
            </div>

        </section>

        <section id="servicos">
            <h2>Atividades</h2>
            <div class="texto">
                <img src="" alt="Atividades da empresa">
                <ul>
                    <li>Serviços de Manicure.</li>
                    <li>Serviços de Pedicure.</li>
                    <li>Vendas de produtos para unhas.</li>
                    <li>Consultoria para desencravamentos.</li>
                    <li>SPA de pé.</li>
                </ul>
            </div>

        </section>

        <section id="estrututa">
            <h2>Nossa Estrutura</h2>
            <div class="texto">
                <img src="" alt="Estrutura da empresa">
                <p>Contamos com trabalho de qualidade, salão confortável e gestão eficiente.
                </p>
            </div>

        </section>

        <section id="contato">
        <h2>Contato</h2>
        <div class="texto">
            <img src="images/ctt_preto.png" alt="Contato da empresa">
            <div>
                <p>Email: contato@cerisabela.com</p>
                <p>Telefone: (99) 99999-9999</p>
                <p>WhatsApp: (99) 99999-9999</p>
                <p>Endereço: Rua Fictícia, 123, Bairro, Cidade, Estado</p>
                <p>Redes sociais: 
                    <a href="https://facebook.com/cerisabela" target="_blank">Facebook</a> |
                    <a href="https://instagram.com/cerisabela" target="_blank">Instagram</a>
                </p>
                  <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#formModal">
                    Fale Conosco
                </button>
            </div>
        </div>
    </section>

  

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
    </main>

   <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
