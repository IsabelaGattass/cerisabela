<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseSite.css">
    <title>Cadastro de Fotos dos Produtos</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>
    <main class="container">
        <div class="titutlo mt-3">
            <h3>Adicionar Imagem escolhida</h3>
        </div>
        <?php
        spl_autoload_register(function ($class) {
            require_once "classes/{$class}.class.php";
        });
        $$idInicial = null;
        if(filter_has_var(INPUT_POST, "btnEditar")):
            
            $i = new ImgInicial(); 
            $idImg = intval(filter_input(INPUT_POST, "idImg"));
            $imagem = $i->search('id_foto', $idImg);

            elseif(filter_has_var(INPUT_GET, '$idInicial')):
                $$idInicial = filter_input(INPUT_GET, '$idInicial');
            endif;
        ?>
        <form method="post" action="dbInicial.php" class="row g-3 mt-3" enctype="multipart/form-data">
            <input type="hidden" name="$idInicial" value=" <?php echo $$idInicial ?? null ?>">
            <input type="hidden" name="idImg" value="<?php echo $imagem->id_imagem ?? null; ?>">
            <input type="hidden" name="imagemAntiga" value="<?php echo $imagem->nome ?? null; ?>">
            <div class="col-md-6 mt-3">
                <label for="legenda" class="form-label">Legenda</label>
                <input type="text" name="legenda" id="legenda" placehoader="Digite a legenda da imagem" required
                    class="form-control" value="<?php echo $imagem->legenda ?? null; ?>">
            </div>
            <div class="col-md-6 mt-3">
                <label for="textoAlt" class="form-label">Texto alternativo</label>
                <input type="text" name="textoAlt" id="textoAlt" placehoader="Digite o texto alternativo da imagem" required
                    class="form-control" value="<?php echo $imagem->alternativo ?? null; ?>">
            </div>
            <div class="col-12 mt-3">
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" name="imagem" id="imagem" class="form-control" accept=".png, .jpg, .jpeg" 
                <?php echo empty($imagem->id_imagem) ? "required" : null ?> >
            </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-outline-info">Gravar</button>
            </div>
        </form>
    </main>
    <footer>
        <?php require_once("_parts/_footer.php"); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>