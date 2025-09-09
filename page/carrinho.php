<?php
session_start();

// Recebe os dados do formulário
$produto = [
    "nome" => $_POST['nome'],
    "preco" => $_POST['preco'],
    "descricao" => $_POST['descricao'],
    "img" => $_POST['img'],
    "qtd" => $_POST['qtd']
];

// Inicializa o carrinho se não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Verifica se o produto já está no carrinho
$existe = false;
foreach ($_SESSION['carrinho'] as &$item) {
    if ($item['nome'] === $produto['nome']) {
        $item['qtd'] += $produto['qtd']; // soma quantidade
        $existe = true;
        break;
    }
}
unset($item);

if (!$existe) {
    $_SESSION['carrinho'][] = $produto; // adiciona novo produto
}



?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/estilos.css">

    <title>Quitanda Online :: Carrinho de Compras</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="d-flex flex-column wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger border-bottom shadow-sm mb-3">
            <div class="container">
                <a class="navbar-brand" href=""><b>Quitanda Online</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../index.php">Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../index.php#Produtos">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../index.php#contato">Contato</a>
                        </li>
                    </ul>
                    <div class="align-self-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="cadastro.html" class="nav-link text-white">Quero Me Cadastrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="login.html" class="nav-link text-white">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <span class="badge rounded-pill bg-light text-danger position-absolute ms-4 mt-0"
                                    title="5 produto(s) no carrinho"><small>5</small></span>
                                <a href="carrinho.html" class="nav-link text-white">
                                    <i class="bi-cart" style="font-size:24px;line-height:24px;"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-fill">
            <div class="container py-4">
                <h1>Carrinho de Compras</h1>
                <ul class="list-group mb-3" id="carrinho-lista">
                    <?php
                    if (empty($_SESSION['carrinho'])) {
                        echo '<p class="text-center text-muted fs-3">🛒 Seu carrinho está vazio</p>';
                    } else {
                        foreach ($_SESSION['carrinho'] as $index => $item) {
                            $subtotal = $item['preco'] * $item['qtd'];
                    ?>
                            <li class="list-group-item py-3" data-index="<?= $index ?>" data-preco="<?= $item['preco'] ?>" data-qtd="<?= $item['qtd'] ?>">

                                <div class="row g-3 align-items-center">
                                    <div class="col-4 col-md-3 col-lg-2">
                                        <img style="height: 100px; width: auto; object-fit: contain;" src="../../<?= $item['img'] ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-8 col-md-6 col-lg-7">
                                        <h4><?= htmlspecialchars((string)$item['nome']) ?></h4>
                                        <p><?= htmlspecialchars((string)$item['descricao']) ?></p>
                                    </div>
                                    <div class="col-12 col-lg-3 text-end">
                                        <small class="text-secondary">
                                            Qtd: <?= htmlspecialchars($item['qtd'] ?? 0) ?> |
                                            Unit: R$ <?= number_format((float)($item['preco'] ?? 0), 2, ",", ".") ?>
                                        </small><br>

                                        <span class="fw-bold subtotal">Subtotal: R$ <?= number_format($subtotal, 2, ",", ".") ?></span><br>
                                        <button class="btn btn-sm btn-outline-danger mt-1 btn-remover">
                                            <i class="bi-trash"></i> Remover
                                        </button>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <li class="list-group-item text-end" id="total-carrinho">
                            <h4>Total: R$ <span id="valor-total">
                                    <?php
                                    $total = array_reduce($_SESSION['carrinho'], fn($sum, $i) => $sum + $i['preco'] * $i['qtd'], 0);
                                    echo number_format($total, 2, ",", ".");
                                    ?>
                                </span></h4>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </main>

        <footer class="border-top text-muted bg-light mt-auto">
            <div class="container">
                <div class="row py-3">
                    <div class="col-12 col-md-4 text-center">
                        &copy; 2020 - Quitanda Online Ltda ME<br>
                        Rua Virtual Inexistente, 171, Compulândia/PC <br>
                        CPNJ 99.999.999/0001-99
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="privacidade.html" class="text-decoration-none text-dark">
                            Política de Privacidade
                        </a><br>
                        <a href="termos.html" class="text-decoration-none text-dark">
                            Termos de Uso
                        </a><br>
                        <a href="quemsomos.html" class="text-decoration-none text-dark">
                            Quem Somos
                        </a><br>
                        <a href="trocas.html" class="text-decoration-none text-dark">
                            Trocas e Devoluções
                        </a>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="contato.html" class="text-decoration-none text-dark">
                            Contato pelo Site
                        </a><br>
                        E-mail: <a href="mailto:email@dominio.com" class="text-decoration-none text-dark">
                            email@dominio.com
                        </a><br>
                        Telefone: <a href="phone:28999990000" class="text-decoration-none text-dark">
                            (28) 99999-0000
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('.btn-remover').forEach(btn => {
            btn.addEventListener('click', function() {
                const li = this.closest('li');
                const preco = parseFloat(li.dataset.preco) || 0;
                const qtd = parseInt(li.dataset.qtd) || 0;
                const subtotal = preco * qtd;

                // Remove item do DOM
                li.remove();


                // Atualiza total
                const totalEl = document.getElementById('valor-total');
                let totalText = totalEl.textContent.replace(/[^0-9,]/g, ""); // remove R$, espaços e outros
                let total = parseFloat(totalText.replace(",", "."));
                total -= subtotal;
                if (total < 0) total = 0;
                totalEl.textContent = total.toFixed(2).replace(".", ",");

                // Se carrinho ficar vazio
                if (document.querySelectorAll('#carrinho-lista li').length === 0) {
                    document.getElementById('carrinho-lista').innerHTML = '<p class="text-center text-muted fs-3">🛒 Seu carrinho está vazio</p>';
                    totalEl.textContent = "R$ 0,00";
                }
            });
        });
    </script>
</body>

</html>