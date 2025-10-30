<?php 
session_start(); 
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="css/baseSite.css">
  <link rel="stylesheet" href="css/index.css">
  
  <link rel="shortcut icon" href="images/banner.png" type="image/x-icon">
  <title>Cerisabela - Esmaltes</title>
</head>
<body style="background-color:#edf1f5ff;">

<!-- ===================== PRELOADER ===================== -->
<div id="preloader">
  <img src="images/esmalte-azul.png" alt="Carregando..." class="preloader-logo">
</div>
<!-- ===================================================== -->

<header>
  <img src="images/logo.png" alt="Logo da Empresa">
  <div class="empresa">
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
                    <li class="nav-item">
                        <a class="nav-link" href="#sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicos">Atividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#estrutura">Nossa Estrutura</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contato">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <main> <!-- Conteúdo principal da página -->
        <div class="dest">
         <!-- Mensagem principal -->
        </div>

<!-- ===================== CONTEÚDO ===================== -->
<main>
  <!-- Início -->
  <section id="inicio" style="display:block; text-align:center; padding:40px 20px;">
    <h2 class="fw-bold text-primary mb-3">Seja bem-vindo ao seu site favorito</h2>
    <p class="lead mb-4">Aqui você encontra os esmaltes mais lindos, com brilho, cor e qualidade pra deixar suas unhas impecáveis! 
        Explore nossas cores e descubra seu estilo. Sinta-se em casa para aproveitar cada espaço do nosso site!</p>
    <img src="images/carrossel/carr3.png" alt="Esmalte Azul" class="img-fluid mt-2 mb-4" style="max-width: 1100px;">
    <br>
    <button class="btn btn-primary btn-lg px-4" onclick="mostrarSecao('Produtos')">
      Veja nossos produtos <i class="bi bi-arrow-right-circle ms-2"></i>
    </button>
  </section>

  <!-- Outras seções -->
  <section id="Sobre" style="display:none;">
    <?php require_once('page/Sobre.php'); ?>
  </section>
  <section id="servicos" style="display:none;">
    <?php require_once('page/Servicos.php'); ?>
  </section>
  <section id="estrutura" style="display:none;">
    <?php require_once('page/Estrutura.php'); ?>
  </section>
  <section id="contato" style="display:none;">
    <?php require_once('page/Contato.php'); ?>
  </section>
  <section id="Produtos" style="display:none;">
    <?php require_once('page/Produtos.php'); ?>
  </section>
  <section id="localizacao" style="display:none;">
    <?php require_once('page/Localizacao.php'); ?>
  </section>
</main>

<!-- ===================== FOOTER ===================== -->
<footer style="background-color: #bfe5f7ff">
  <?php require_once "_parts/_footer.php" ?>
</footer>

<!-- ===================== SCRIPTS ===================== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function mostrarSecao(secaoId) {
    document.querySelectorAll("main section").forEach(secao => {
      secao.style.display = (secao.id === secaoId) ? "block" : "none";
    });
  }

  // Preloader
  document.addEventListener("readystatechange", () => {
    if (document.readyState === "complete") {
      const preloader = document.getElementById("preloader");
      setTimeout(() => {
        preloader.classList.add("fade-out");
        setTimeout(() => preloader.remove(), 600);
      }, 2000);
    }
  });
</script>

</body>
</html>
