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

  <nav class="navbar navbar-expand-lg nav-custom" style="background-color: #bfe5f7ff">
    <div class="container-fluid">
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('inicio')">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('Produtos')">Produtos</a></li>
          <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('Favoritos')">Favoritos</a></li>

          <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('Sobre')">Sobre</a></li>
          <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('servicos')">Atividades</a></li>
          <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('estrutura')">Nossa Estrutura</a></li>
          <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('contato')">Contato</a></li>
          <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('localizacao')">Localização</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- ===================== CARROSSEL (EM TODAS AS PÁGINAS) ===================== -->
  <div id="carouselExampleAutoplaying" class="carousel slide mb-4" data-bs-ride="carousel" data-bs-interval="2500">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"></button>
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/carrossel/carr1.png" class="d-block w-100" alt="Slide 1">
      </div>
      <div class="carousel-item">
        <img src="images/carrossel/carr2.png" class="d-block w-100" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="images/carrossel/carr3.png" class="d-block w-100" alt="Slide 3">
      </div>
      <div class="carousel-item">
        <img src="images/carrossel/carr4.png" class="d-block w-100" alt="Slide 4">
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Próximo</span>
    </button>
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
    <section id="Favoritos" style="display:none;">
      <?php require_once('page/Favoritos.php'); ?>
    </section>
  </main>

  <!-- ===================== FOOTER ===================== -->
  <footer style="background-color: #bfe5f7ff">
    <?php require_once "_parts/_footer.php" ?>
  </footer>
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
<footer style="background-color: #7ec2f0ff ">
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

    // 4. ADICIONE A FUNÇÃO 'toggleHeart' AQUI
    function toggleHeart(produtoId) {
      // 1. Encontra o ícone na página
      let icon = document.getElementById('heart-icon-' + produtoId);
      if (!icon) return; // Se o ícone não estiver na tela, para.

      // 2. Chama o arquivo PHP no servidor, passando o ID
      // Usamos 'page/update_heart.php' para manter na pasta 'page'
      fetch('page/update_heart.php?id=' + produtoId)
        .then(response => response.json()) // Espera uma resposta em JSON
        .then(data => {
          // 4. A resposta (data.newState) diz se é '-fill' ou ''
          if (data.newState === '-fill') {
            // Atualiza o ícone para PREENCHIDO
            icon.classList.remove('bi-suit-heart');
            icon.classList.add('bi-suit-heart-fill');
          } else {
            // Atualiza o ícone para VAZIO
            icon.classList.remove('bi-suit-heart-fill');
            icon.classList.add('bi-suit-heart');

            // Opcional: Se estivermos na página de favoritos, remove o item da tela
            const secaoFavoritos = document.getElementById('Favoritos');
            if (secaoFavoritos.style.display === 'block') {
              icon.closest('.col-12').remove();
            }
          }
        })
        .catch(error => console.error('Erro ao atualizar favorito:', error));
    }
  </script>

</body>

</html>
