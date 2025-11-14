<?php
// --- session_start() NÃO É NECESSÁRIO ---
// A sessão já foi iniciada pelo index.php

// 1. Pega todos os produtos da sessão (se existirem)
$todosProdutos = isset($_SESSION['produtos']) ? $_SESSION['produtos'] : [];

// 2. Filtra o array para pegar APENAS os favoritos
$favoritos = [];
if (!empty($todosProdutos)) {
    $favoritos = array_filter($todosProdutos, function ($produto) {
        return $produto['heart'] === '-fill';
    });
}
?>

<div class="container-fluid">
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <h2 class="text-center my-0">Meus Produtos Favoritos</h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row g-3">

        <?php if (empty($favoritos)): ?>
            <div class="col-12">
                <p class="text-center fs-4 text-muted">
                    <i class="bi bi-suit-heart"></i>
                </p>
                <p class="text-center fs-4 text-muted">Você ainda não favoritou nenhum produto.</p>
                <p class="text-center">
                    <a href="#" class="btn btn-primary" onclick="mostrarSecao('Produtos')">Ver Produtos</a>
                </p>
            </div>
        <?php else: ?>
            <?php foreach ($favoritos as $produto): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="card text-center bg-light">

                        <a onclick="toggleHeart(<?= $produto['id'] ?>)" class="position-absolute end-0 p-2 text-danger" style="text-decoration: none; cursor: pointer;">
                            <i id="heart-icon-<?= $produto['id'] ?>" class="bi bi-suit-heart<?= $produto['heart'] ?>" style="font-size: 24px;"></i>
                        </a>

                        <a href="#">
                            <img src="<?= $produto['imagem'] ?>" class="card-img-top" alt="<?= $produto['nome'] ?>">
                        </a>
                        <div class="card-header">R$ <?= number_format($produto['preco'], 2, ",", ".") ?></div>
                        <div class="card-body">
                            <h5 class="card-title" style="height: 50px; font-size: 14px;"><?= $produto['nome'] ?></h5>
                            <p class="card-text" style="font-size: 12px;"><?= $produto['descricao'] ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-success">Disponível</small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<div class="container">

    <div style="display: flex; justify-content: center; align-items: center; height: 20vh;">
        <a href="https://wa.me/556999083582?text=Olá%2C%20gostaria%20de%20realizar%20um%20pedido!"
            class="btn btn-primary" target="_blank">
            Para realizar pedido
        </a>
    </div>

</div>