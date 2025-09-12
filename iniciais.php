<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Ícones Bootstrap (Necessário para <i class="bi bi-trash">, etc.) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Seu CSS personalizado -->
    <link rel="stylesheet" href="CSS/baseAdmin.css">
</head>

<body>
    <main class="container my-4">
        <div class="bg-primary text-white rounded p-3 mb-4 shadow-sm">
            <h3 class="m-0">Página Inicial</h3>
        </div>

        <div class="mb-3">
            <a href="CadastroEmpresa.php" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Novo
            </a>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Título</th>
                        <th>Subtítulo</th>
                        <th>Informações</th>
                        <th>Imagem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Autoload das classes
                    spl_autoload_register(function ($class) {
                        require_once "classes/{$class}.class.php";
                    });

                    // Instância da classe Inicial e obtenção dos dados
                    $i = new Inicial();
                    $inicio = $i->all();

                    // Verifica se há dados para exibir
                    if ($inicio && is_array($inicio)) {
                        foreach ($inicio as $inicial): ?>
                            <tr>
                                <td><?= $inicial->id_inicial; ?></td>
                                <td><?= $inicial->nome; ?></td>
                                <td><?= $inicial->titulo; ?></td>
                                <td><?= $inicial->subtitulo; ?></td>
                                <td><?= $inicial->info; ?></td>
                                <td>
                                    <?php if (!empty($inicial->imagem)): ?>
                                        <img src="<?= $inicial->imagem; ?>" alt="Imagem" width="80">
                                    <?php else: ?>
                                        Sem imagem
                                    <?php endif; ?>
                                </td>
                                <td class="d-flex justify-content-center gap-1">

                                    <!-- Botão Editar -->
                                    <form action="CadastroInicial.php" method="post" class="d-inline">
                                        <input type="hidden" name="id_inicial" value="<?= $inicial->id_inicial ?>">
                                        <button name="btnEditar" class="btn btn-primary btn-sm" type="submit"
                                            onclick="return confirm('Tem certeza que deseja editar as informações?');">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </form>

                                    <!-- Botão Excluir -->
                                    <form action="DbInicial.php" method="post" class="d-inline">
                                        <input type="hidden" name="id_inicial" value="<?= $inicial->id_inicial ?>">
                                        <button name="btnDeletar" class="btn btn-danger btn-sm" type="submit"
                                            onclick="return confirm('Tem certeza que deseja deletar as informações da empresa?');">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach;
                    } else { ?>
                        <tr>
                            <td colspan="7">Nenhuma informação encontrada.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>