<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cerisabela</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css" />
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
  <!-- Seu CSS -->
  <link rel="stylesheet" href="css/layout.css">
   <link rel="stylesheet" href="css/baseSite.css" />
</head>
<body>

  <header>
    <?php require_once "_parts/_menu.php"; ?>
  </header>

  <!-- não é nosso esse coiso de vitamina (O NOSSO É ESMALTES) -->
<div class="bloco-fundo-vitaminas largura-total">
    <div class="conteudo-esmaltes">
        <h1 class="titulo-esmaltação">
            <span class="subtitulo-vitaminas">CERISABELA</span><br>
            ESMALTES E ESMALTAÇÕES
        </h1>
    </div>
</div>


   <!-- Seção Localização -->

<div class="container-local">
  <div class="map-sessao">
    <!-- Lado esquerdo: imagem grande -->
    <div class="map-imagem">
      <img src="images/brasilmapa.png" alt="Imagemnos_maps">
    </div>

    <!-- Lado direito: texto -->
    <div class="map-texto">
      <h2>Nosso Endereço</h2>
      <p><strong>Local:</strong> IFRO - Campus Cacoal</p>
      <p><strong>WhatsApp:</strong> (69) 9 9999-9999</p>
      <p><strong>E-mail:</strong> cerisabela@gmail.com</p>
      <p><strong>Horário:</strong> Segunda a Sexta, das 9h30 às 18H</p>
      <p><strong>Horário de Funcionamento:</strong></p>
      <p>Segunda a Sexta-feira, das 9h30 às 17h30</p>
    </div>
  </div>
</div>
 <!-- fecha container-local aqui -->

<!-- mapa e quadrado de texto -->
<div class="map-section">
  <div class="map-text">
    <h2>Encontre a CERISABELA facilmente</h2>
    <p>Veja no mapa como chegar até nossa empresa de forma rápida e prática.</p>
    <a href="https://www.google.com/maps/dir/?api=1&destination=Instituto+Federal+de+Rond%C3%B4nia+-+Cacoal"
       target="_blank" class="btn-navegar"></a>
  </div>
  <div class="map-iframe">
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6575.7818512287395!2d-61.382980760601235!3d-11.481131343266814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93c826519e7eca21%3A0x9c3ad57fa8cc996d!2sInstituto%20Federal%20de%20Rond%C3%B4nia%20-%20C%C3%A2mpus%20Cacoal!5e0!3m2!1spt-BR!2sbr!4v1756137156568!5m2!1spt-BR!2sbr"
      width="20%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</div>


</div>

  
  <div class="horario"></div>

  
  </div>
  <footer>
    <?php require_once "_parts/_footer.php"; ?>
  </footer>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="_parts/_menu.php"></script>

  
</body>
</html>