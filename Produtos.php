<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Produtos</title>
</head>

<body>
    <main class="container mt-3">
        <div class="mt-3">
            <h3>Produtos</h3>
        </div>
        <div class="mt-3">
            <a href="CadastroProduto.php" class="btn btn-success">Novo produto</a>
        </div>
        <table class="cadastroProduto">
            <thead class="table-info">
                <tr>
                    <th>#</th>
                    <th>Produto</th>
                    <th>Formatar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "classes/{$class}.class.php";
                });
                $p = new Produto();
                $produtos = $p->all();
                foreach ($produtos as $produto):
                ?>
                <tr>
                    <td><?php echo $produto->idProduto; ?></td>
                    <td><?php echo $produto->nome; ?></td>
                    <td>
                        <a href="#" class="btn btn-info">
                            <i class="bi bi-pencil-square"></i> </a> 
                            | 
                             <a href="#" class="btn btn-info">
                            <i class="bi bi-trash3"></i> </a> </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
    <?php require_once "_parts/_footer.php"; ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>