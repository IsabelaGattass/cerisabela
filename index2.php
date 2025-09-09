<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="images/logosite.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons oficial -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/baseSite.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/base.css">

    <title>CERISABELA - Esmaltes</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="d-flex flex-column wrapper">

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger border-bottom shadow-sm mb-3">
            <div class="container">
                <a class="navbar-brand" href="#"><b>CERISABELA - Esmaltes</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item"><a class="nav-link text-white" href="index.php">Sobre nós</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="contato.php">Contato</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="CadastroEmpresa.php">Empresa</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="CadastroClientes.php">Cliente</a></li>
                    </ul>
                    <div class="align-self-end">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="CadastroUsuario.php" class="nav-link text-white">Quero Me Cadastrar</a></li>
                            <li class="nav-item"><a href="LoginUsuario.php" class="nav-link text-white">Entrar</a></li>
                            <li class="nav-item position-relative">
                                <span class="badge rounded-pill bg-light text-danger position-absolute top-0 start-100 translate-middle"
                                    title="5 produto(s) no carrinho"><small>5</small></span>
                                <a href="carrinho.html" class="nav-link text-white">
                                    <i class="bi bi-cart" style="font-size:24px;"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

<<<<<<< HEAD
        <div class="container">
            <div id="carouselMain" class="carousel slide carousel-dark" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="images/carrosel/carr1.png" class="d-none d-md-block w-100" alt="">
                        <img src="images/carrosel/carr1small.png" class="d-block d-md-none  w-100" alt="">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="img/carrosel/carr2.png" class="d-none d-md-block w-100" alt="">
                        <img src="img/carrosel/carr2small.png" class="d-block d-md-none  w-100" alt="">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="images/carrosel/carr3.png" class="d-none d-md-block w-100" alt="">
                        <img src="images/carrosel/carr3small.png" class="d-block d-md-none  w-100" alt="">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselMain" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselMain" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
            <hr class="mt-3">
        </div>

=======
        <!-- CONTEÚDO -->
>>>>>>> 6965f349bbe1fcf9bc9a4e8c702dcc362733a9a5
        <main class="flex-fill">
            <div class="container">



                <!-- Cards de Produtos (mantive sua estrutura, mas corrigi fechamento de <a>) -->
                <?php
                $produtos = [
                    [
                        "nome" => "Esmalte Risqué Léo Mandou Flores",
                        "preco" => "8,99",
                        "descricao" => "Esmalte Cremoso 8ml",
                        "imagem" => "images/esmaltes/emt1.png"
                    ],
                    [
                        "nome" => "Esmalte Risqué Vermelho Ivete",
                        "preco" => "9,49",
                        "descricao" => "Esmalte Cremoso 8ml",
                        "imagem" => "images/esmaltes/emt1.png"
                    ],
                    [
                        "nome" => "Esmalte Risqué Azul Celeste",
                        "preco" => "8,79",
                        "descricao" => "Esmalte Cremoso 8ml",
                        "imagem" => "images/esmaltes/emt1.png"
                    ],
                    [
                        "nome" => "Esmalte Risqué Nude Elegante",
                        "preco" => "10,90",
                        "descricao" => "Esmalte Cremoso 8ml",
                        "imagem" => "images/esmaltes/emt1.png"
                    ]
                ];

                // repete até ter 12 produtos
                $listaFinal = [];
                for ($i = 0; $i < 12; $i++) {
                    $listaFinal[] = $produtos[$i % count($produtos)];
                }
                ?>

                <div class="row g-3">
                    <?php foreach ($listaFinal as $produto): ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="card text-center bg-light">
                                <a href="#" class="position-absolute end-0 p-2 text-danger">
                                    <i class="bi bi-suit-heart" style="font-size: 24px;"></i>
                                </a>
                                <a href="produto.php">
                                    <img src="<?= $produto['imagem'] ?>" class="card-img-top" alt="<?= $produto['nome'] ?>">
                                </a>
                                <div class="card-header">R$ <?= $produto['preco'] ?></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="height: 50px; font-size: 14px;"><?= $produto['nome'] ?></h5>
                                    <p class="card-text truncar-3l"><?= $produto['descricao'] ?></p>
                                </div>
                                <div class="card-footer">
                                    <a href="carrinho.php" class="btn btn-outline-info">Adicionar ao Carrinho</a>
                                    <small class="text-success">Disponível</small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


            </div>
        </main>

        <!-- FOOTER -->
        <footer>
            <?php require_once "_parts/_footer.php" ?>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>