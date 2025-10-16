<?php
session_start();  // Inicia a sessão PHP, permitindo armazenar e recuperar dados durante a navegação.
?>
<!DOCTYPE html>
<html lang="pt-BR"> <!-- Define que o conteúdo da página está em português (Brasil) -->

<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsividade: ajusta a escala para dispositivos móveis -->
    
    <!-- Importação do Bootstrap para estilização rápida e responsiva -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Links para arquivos de estilos personalizados -->
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/baseSite.css">
    <link rel="stylesheet" href="css/index.css">
    
    <!-- Favicon da página (ícone que aparece na aba do navegador) -->
    <link rel="shortcut icon" href="images/banner.png" type="image/x-icon">
    
    <!-- Título da página (aparece na aba do navegador) -->
    <title>Cerisabela - Esmaltes</title>
</head>

<body style="background-color:#111b53;"> <!-- Define o fundo da página com a cor #bde3eeff -->
    <!-- Cabeçalho da página -->
    <header>
        <img src="images/logo.png" alt="Logo da Empresa"> <!-- Logo da empresa -->
        <div class="empresa"> <!-- Informações sobre a empresa -->
            <h1>CERISABELA</h1>
            <p>Especializada em Unhas</p>
        </div>
    </header>

    <!-- Menu de navegação da página -->
    <nav class="navbar navbar-expand-lg nav-custom">
        <div class="container-fluid">
            <!-- Botão para abrir o menu em telas pequenas -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> <!-- Ícone para o menu em dispositivos pequenos -->
            </button>

            <!-- Menu de navegação com links para as seções -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('Produtos')">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('sobre')">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('servicos')">Atividades</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('estrutura')">Nossa Estrutura</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('contato')">Contato</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('localizacao')">Localização</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <main> <!-- Conteúdo principal da página -->
        <div class="dest">
            
        </div>

        <!-- Seções que são carregadas dinamicamente -->
        <section id="sobre">
            <?php require_once('page/Sobre.php'); ?> <!-- Inclui o conteúdo da página "Sobre" -->
        </section>

        <section id="servicos" style="display:none;">
            <?php require_once('page/Servicos.php'); ?> <!-- Inclui o conteúdo da página "Servicos", inicialmente escondido -->
        </section>

        <section id="estrutura" style="display:none;">
            <?php require_once('page/Estrutura.php'); ?> <!-- Inclui o conteúdo da página "Estrutura", inicialmente escondido -->
        </section>

        <section id="contato" style="display:none;">
            <?php require_once('page/Contato.php'); ?> <!-- Inclui o conteúdo da página "Contato", inicialmente escondido -->
        </section>

        <section id="Produtos" style="display:none;">
            <?php require_once('page/Produtos.php'); ?> <!-- Inclui o conteúdo da página "Produtos", inicialmente escondido -->
        </section>
        <section id="localizacao" style="display:none;">
            <?php require_once('page/Localizacao.php'); ?> <!-- Inclui o conteúdo da página "Produtos", inicialmente escondido -->
        </section>

    </main>

    <!-- Rodapé da página -->
    <footer>
        <?php require_once "_parts/_footer.php" ?> <!-- Inclui o conteúdo do rodapé -->
    </footer>

    <!-- Importação do script do Bootstrap para funcionalidades como o menu de navegação -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Função para mostrar a seção correspondente ao link clicado
        function mostrarSecao(secaoId) {
            document.querySelectorAll("main section").forEach(secao => {
                secao.style.display = (secao.id === secaoId) ? "block" : "none"; // Exibe a seção correta e esconde as outras
            });
        }

        // Quando o conteúdo da página estiver carregado
        window.addEventListener('DOMContentLoaded', () => {
            const hash = window.location.hash; // Verifica se há um hash na URL
            if (hash) {
                const el = document.querySelector(hash); // Busca o elemento correspondente ao hash
                if (el) {
                    // Mostra a seção correspondente ao hash na URL
                    document.querySelectorAll("main section").forEach(secao => {
                        secao.style.display = (secao.id === hash.substring(1)) ? "block" : "none"; // Exibe a seção correta e esconde as outras
                    });
                    // Realiza o scroll suave até a seção
                    el.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    </script>
</body>

</html>
