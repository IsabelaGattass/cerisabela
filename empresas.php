<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- database link css -->
     <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Empresas</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <main class="container my-4">
        <div class="bg-primary text-white rounded p-3 mb-4 shadow-sm">
            <h3 class="m-0">Empresas</h3>
        </div>

        <div class="mb-3">
            <a href="CadastroEmpresa.php" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i>Nova Empresa</a>
        </div>

        <div class="table dataTable ">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Empresa</th>
                        <th>CNPJ</th>
                        <th>Nome Fantasia</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Responsáveis</th>
                        <th>Atividade Econômica</th>
                        <th>Rede Social</th>
                        <th>Apresentação</th>
                        <th>Histórico</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    spl_autoload_register(function ($class) {
                        require_once "classes/{$class}.class.php";
                    });
                    $e = new Empresa();
                    $empresas = $e->all();
                    foreach ($empresas as $empresa):
                        ?>
                        <tr>
                            <td><?php echo $empresa->id_empresa; ?></td>
                            <td class="text-center"><?php echo $empresa->nome; ?></td>
                            <td><?php echo $empresa->cnpj; ?></td>
                            <td><?php echo $empresa->nome_fant; ?> </td>
                            <td><?php echo $empresa->telefone; ?></td>
                            <td><?php echo $empresa->email; ?></td>
                            <td><?php echo $empresa->responsaveis; ?></td>
                            <td><?php echo $empresa->atv_economica; ?></td>
                            <td><?php echo $empresa->rede_social; ?></td>
                            <td><?php echo $empresa->apresentacao; ?></td>
                            <td><?php echo $empresa->historico; ?></td>
                            <td class="d-flex justify-content-center gap-1">

                                <!-- Botão Editar -->
                                <form action="<?php echo htmlspecialchars("CadastroEmpresa.php") ?>" method="post"
                                    class="d-flex">
                                    <input type="hidden" name="id_empresa" value="<?php echo $empresa->id_empresa ?>">
                                    <button name="btnEditar" class="btn btn-primary btn-sm" type="submit"
                                        onclick="return confirm('Tem certeza que deseja editar as informações da empresa?');">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </form>

                                <!-- Botão Excluir -->
                                <form action="<?php echo htmlspecialchars("DbEmpresa.php") ?>" method="post" class="d-flex">
                                    <input type="hidden" name="id_empresa"
                                        value="<?php echo $empresa->id_empresa ?>"><button name="btnDeletar"
                                        class="btn btn-danger btn-sm" type="submit"
                                        onclick="return confirm('Tem certeza que deseja deletar as informações da empresa?');"><i
                                            class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </main>

        <footer>
        <?php require_once("_parts/_footer.php"); ?>
    </footer>

    <!-- link jquery -->
     <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js" type="text/javascript"></script>

    <!-- link database JS -->

    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

    <!-- link database JS bootstrap -->
     <script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.min.js"> </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>