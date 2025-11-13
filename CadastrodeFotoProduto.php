<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <link rel="stylesheet" href="CSS/baseSite.css">
    <title>Adicionar Fotos do Produto</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>
    <main class="container">
        <div class="titulo mt-3">
            <h3>Adicionar Fotos</h3>
        </div>

        <?php
        spl_autoload_register(function ($class) {
            require_once "classes/{$class}.class.php";
        });

        $idFoto = null;
        $foto = null;
        $idProduto = null;

        if (filter_has_var(INPUT_POST, "btnEditar")) {
            $f = new FotoProduto();
            $idFoto = intval(filter_input(INPUT_POST, 'idFoto'));
            $foto = $f->search('id_foto', $idFoto);
            $idProduto = $foto->fk_produto;
        } elseif (filter_has_var(INPUT_GET, "idProduto")) {
            $idProduto = filter_input(INPUT_GET, "idProduto");
        }
        ?>

        <form method="post" action="bdFotoProduto.php" class="row g-3 mt-3" enctype="multipart/form-data">
            <input type="hidden" name="idProduto" value="<?= $idProduto ?? null; ?>">
            <input type="hidden" name="idFoto" value="<?= $foto->id_foto ?? null; ?>">

            <div class="col-md-6 mt-3">
                <label for="legenda" class="form-label">Legenda</label>
                <input type="text" name="legenda" id="legenda" placeholder="Digite a legenda da foto" required
                    class="form-control" value="<?= $foto->legenda ?? ''; ?>">
            </div>

            <div class="col-md-6 mt-3">
                <label for="textoAlt" class="form-label">Texto alternativo</label>
                <input type="text" name="textoAlt" id="textoAlt" placeholder="Digite o texto alternativo" required
                    class="form-control" value="<?= $foto->alternativo ?? ''; ?>">
            </div>

            <!-- Foto Frente -->
            <div class="col-md-6 mt-3">
                <label for="fotoFrente" class="form-label">Foto da Frente</label>
                <input type="file" name="fotoFrente" id="fotoFrente" class="form-control" accept=".png, .jpg, .jpeg">
                <?php if (!empty($foto->frente)): ?>
                    <div class="mt-2">
                        <img src="uploads/<?= $foto->frente ?>" alt="Foto da Frente" class="img-thumbnail" width="150">
                        <p class="text-muted mb-0">Foto atual</p>
                    </div>
                <?php endif; ?>
            </div>

       
   
            </div>

            <div class="col-12 mt-3">
                <button type="submit" name="btnGravar" class="btn btn-success">Gravar</button>
            </div>
        </form>
    </main>

    <footer>
        <?php require_once("_parts/_footer.php"); ?>
    </footer>
</body>

</html>