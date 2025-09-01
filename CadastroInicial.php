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

?>
<body>

<main class = "container">
    <form action="dbInicial.php" method="post" class="row g3 mt-3"></form>
     <div class="col-md-3"> 
           <label for="nome" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Adicione o título de sua preferência" required class="form-control">
        </div>

             <div class="col-md-3"> 
           <label for="nome" class="form-label">Informações adicionais:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Adicione outras informações de sua preferência" required class="form-control">
        </div>



    <div class="input-group col-mb-12">
  <label class="form-control" for="logo">Adicione a Logo de sua preferência</label>
  <input type="file" id="logo" class="form-control">
</div>

    <div class="input-group col-mb-12">
  <label class="input-group-text" for="banners">Adicione o Banner de sua preferência</label>
  <input type="file" id="banners" class="form-control">
</div>


  <button type="submit" name="btnConfirmar" 
  id="btnConfirmar" class="btn btn-outline-primary">Confirmar</button> 
    </form>
</main>

</body>
</html>