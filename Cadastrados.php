<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Clientes</title>
</head>

<body>
    <header>
        <?php require_once "_parts/_menu.php"; ?>
    </header>

    <main class="container mt-3">
        <div class="mt-3">
            <h3>Clientes</h3>
        </div>
        <div class="mt-3">
            <a href="CadastroClientes.php" class="btn btn-success">Novo Cliente</a>
        </div>

        <table class="table">
            <thead class="table-info">
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "classes/{$class}.class.php";
                });

                $c = new cliente();
                $clientes = $c->all(); 

                foreach ($clientes as $cliente):
                ?>
                    <tr>
                        <td><?php echo $cliente->id; ?></td>
                        <td><?php echo $cliente->nomeCliente; ?></td> 
                        <td class="d-flex justify-content-center gap-1">
                            <!-- Botão Editar -->
                            <form action="CadastroClientes.php" method="post" class="d-flex">
                                <input type="hidden" name="id" value="<?php echo $cliente->id; ?>">
                                <button name="btnEditar" class="btn btn-primary btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja editar o cliente?');">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>

                            <!-- Botão Deletar -->
                            <form action="dbCliente.php" method="post" class="d-flex">
                                <input type="hidden" name="id" value="<?php echo $cliente->id; ?>">
                                <button name="btnDeletar" class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('Tem certeza que deseja apagar o cliente?');">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
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