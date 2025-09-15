<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="CSS/baseSite.css">
  <title>Cadastro Inicial</title>
</head>

<?php
 spl_autoload_register(function ($class) {
            require_once "classes/{$class}.class.php";
        });
        $idInicial = null;
        if(filter_has_var(INPUT_POST, "btnEditar")):
            // vamo fazer depois
            elseif(filter_has_var(INPUT_GET, 'idInicial')):
                $idInicial= filter_input(INPUT_GET, 'idInicial');
            endif;
?>
<body>

<body>

  <main class="container">
    <div class="titutlo mt-3">
      <h3>Formulário Inicial</h3>
    </div>
    <?php
    spl_autoload_register(function ($class) {
      require_once "classes/{$class}.class.php";
    });
    ?>
    <form method="post" action="dbInicial.php" class="row g-3 mt-3">

      <div class="col-md-6 mt-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" name="titulo" id="titulo" placehoader="Digite o título de sua preferência" required
          class="form-control" value="">
          
      </div>
      <div class="col-md-6 mt-3">
        <label for="subtitulo" class="form-label">Subtítulo</label>
        <input type="text" name="subtitulo" id="subtitulo" placehoader="Digite o subtitulo de sua preferência" required
          class="form-control" value="">
      </div>


      <div class="mb-3">
        <label for="info" class="form-label">Informações</label>
        <textarea class="form-control" name="info" id="info" rows="3"></textarea>
      </div>

              <div class="mb-3">
            <a href="gerImgInicial.php" class="btn btn-info">
                <i class="bi bi-plus-circle"></i>Adicionar Imagem</a>
        </div>

      <div class="col-12 mt-3">
        <button type="submit" class="btn btn-outline-info">Gravar</button>
      </div>
    </form>
  </main>


     <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>

</html>