<?php
spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});

$produto = null; // evita erro de variável indefinida
$idProduto = null;

// verifica se o idProduto veio pela URL
if (filter_has_var(INPUT_GET, "idProduto")) {
    $p = new Produto();
    $idProduto = intval(filter_input(INPUT_GET, "idProduto"));
    $produto = $p->search("idProduto", $idProduto);
}

// se não veio idProduto, redireciona de volta ou mostra aviso
if (!$produto) {
    echo "<div style='padding:20px; background:#f8d7da; color:#721c24; border-radius:5px; margin:20px;'>
            ⚠️ Nenhum produto selecionado. <a href='index.php'>Voltar</a>
          </div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <link rel="stylesheet" href="CSS/foto.css">
    <title>Fotos do produto: <?php echo $produto->idProduto ?></title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>
    <main class="container mt-3">
        <div class="mt-3">
            <h4><?php echo $produto->idProduto ?></h4>
        </div>
        <div class="mb-3 mt-3">
            <a href="gerFotoProduto.php?idProduto=<?php echo $produto->idProduto ?>" class="btn btn-outline-success"
                type="submit">
                Nova Foto
            </a>
        </div>
        <!-- Código php para spl_autoload_register -->
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <?php
            $f = new FotoProduto();
            $fotos = $f->fotosproduto($produto->idProduto);
            foreach ($fotos as $foto):
                ?>

                <div class="card">
                    <img src="uploads/<?= $foto->nome ?>" class="card-img-top" alt="<?= $foto->alternativo ?>">
                    <div class="card-body">

                        <p class="card-text"><?= $foto->legenda ?></p>
                        <div class="d-flex justify-content-center gap-1">
                            <form action="gerFotoProduto.php" method="post">
                                <input type="hidden" name="idFoto" value="<?= $foto->id_foto; ?>">
                                <button type="submit" name="btnEditar" class="btn btn-success btn-sm bi">
                                    <span class=""><i class="bi bi-pencil-square"></i></span>
                            </button>
                        </form>
                        <form action="dbFotoProduto.php" method="post" class="d-flex">
                            <input type="hidden" name="idFoto" value="<?= $foto->id_foto; ?>">
                            <button name="btnDeletar" class="btn btn-dark btn-sm" type="submit"
                                onclick="return confirm('Tem certeza que deseja deletar a Foto?');">
                                <span class=""><i class="bi bi-trash"></i></span>
                              </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        </div>
    </main>
    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="JS/exibir.js"></script>
</body>

</html>
