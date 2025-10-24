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
        <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('Produtos')">Produtos</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('Sobre')">Sobre</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('servicos')">Atividades</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('estrutura')">Nossa Estrutura</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('contato')">Contato</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarSecao('localizacao')">Localização</a></li>
      </ul>
    </div>
  </div>
</nav>

<main>
  <!-- ================= CARROSSEL ================= -->
  <div id="carouselExampleAutoplaying" class="carousel slide mb-4" data-bs-ride="carousel" data-bs-interval="2000">
    
    <!-- Indicadores -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"></button>
    </div>

    <!-- Slides -->
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
    </div>

    <!-- Controles -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Próximo</span>
    </button>
  </div>
  <!-- ============================================ -->

  <!-- Seções -->
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

<footer style="background-color: #bfe5f7ff">
  <?php require_once "_parts/_footer.php" ?>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Mostrar seções
  function mostrarSecao(secaoId) {
    document.querySelectorAll("main section").forEach(secao => {
      secao.style.display = (secao.id === secaoId) ? "block" : "none";
    });
  }

  // Mostrar seção baseada no hash da URL
  window.addEventListener('DOMContentLoaded', () => {
    const hash = window.location.hash;
    if (hash) {
      const el = document.querySelector(hash);
      if (el) {
        document.querySelectorAll("main section").forEach(secao => {
          secao.style.display = (secao.id === hash.substring(1)) ? "block" : "none";
        });
        el.scrollIntoView({ behavior: 'smooth' });
      }
    }
  });

  // Preloader com pelo menos 3 segundos
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
