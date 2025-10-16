<!DOCTYPE html>
<html lang="pt-BR"> <!-- Define o tipo de documento e a linguagem como português do Brasil -->

<head>
    <meta charset="UTF-8"> <!-- Define o padrão de caracteres como UTF-8 (suporta acentos e caracteres especiais) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Ajusta o layout para ser responsivo em dispositivos móveis -->
    
    <!-- Importa o CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Importa ícones do Bootstrap (biblioteca de ícones prontos) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    
    <!-- Importa um CSS próprio chamado baseAdmin.css -->
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    
    <title>Produtos</title> <!-- Título exibido na aba do navegador -->
</head>

<body class="d-flex flex-column min-vh-100"> <!-- Define o body como flex, coluna e altura mínima igual à tela inteira -->
    
    <header>
        <?php require_once "_parts/_menu.php"; ?> <!-- Inclui o menu de navegação através de um arquivo PHP -->
    </header>

    <main class="container my-4"> <!-- Container central com margem vertical -->
        
        <!-- Caixa estilizada com título da tabela -->
        <div class="bg-primary text-white rounded p-3 mb-4 shadow-sm">
            <h3 class="m-0">Tabela de produtos</h3>
        </div>

        <!-- Botão para adicionar novo produto -->
        <div class="mb-3">
            <a href="CadastroProduto.php" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Novo Produto <!-- Ícone + texto -->
            </a>
        </div>

        <!-- Tabela responsiva com borda, hover e alinhamento central -->
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary"> <!-- Cabeçalho da tabela -->
                    <tr>
                        <th>#</th> <!-- Coluna numérica -->
                        <th>Produto</th> <!-- Nome do produto -->
                        <th>Ações</th> <!-- Botões de ação (editar/deletar) -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Autoloader para carregar classes automaticamente
                    spl_autoload_register(function ($class) {
                        require_once "classes/{$class}.class.php";
                    });

                    // Instancia a classe Produto
                    $p = new Produto();

                    // Busca todos os produtos no banco
                    $produtos = $p->all();

                    // Loop para exibir cada produto na tabela
                    foreach ($produtos as $chave => $produto):
                    ?>
                        <tr>
                            <!-- Número da linha (incrementado +1 para não começar no 0) -->
                            <td><?php echo $chave+1 ?></td>
                            
                            <!-- Nome do produto alinhado à esquerda -->
                            <td class="text-start"><?php echo $produto->nome; ?></td>
                            
                            <!-- Coluna com botões de ação -->
                            <td class="d-flex justify-content-center gap-1">
                                
                                <!-- Formulário para editar produto -->
                                <form action="CadastroProduto.php" method="post" class="d-flex">
                                    <!-- Campo oculto com ID do produto -->
                                    <input type="hidden" name="idProduto" value="<?= $produto->idProduto ?>">
                                    
                                    <!-- Botão de editar com ícone -->
                                    <button name="btnAlterar" class="btn btn-primary btn-sm" type="submit">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </form>

                                <!-- Formulário para deletar produto -->
                                <form action="processa_produto.php" method="post" class="d-flex">
                                    <!-- Campo oculto com ID do produto -->
                                    <input type="hidden" name="idProduto" value="<?= $produto->idProduto ?>">
                                    
                                    <!-- Botão de deletar com confirmação -->
                                    <button name="btnDeletar" class="btn btn-danger btn-sm" type="submit"
                                        onclick="return confirm('Tem certeza que deseja deletar o produto?');">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?> <!-- Fecha o loop dos produtos -->
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <?php require_once "_parts/_footer.php"; ?> <!-- Inclui rodapé via arquivo PHP -->
    </footer>

    <!-- Importa scripts do Bootstrap (JS + Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>