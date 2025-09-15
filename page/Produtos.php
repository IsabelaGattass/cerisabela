<?php


$produtos = [
    [
        "nome" => "Esmalte Risqué Léo Mandou Flores",
        "preco" => 8.99,
        "descricao" => "Esmalte Cremoso 8ml",
        "imagem" => "images/esmaltes/emt1.png"
    ],
    [
        "nome" => "Esmalte Risqué Vermelho Ivete",
        "preco" => 9.49,
        "descricao" => "Esmalte Cremoso 8ml",
        "imagem" => "images/esmaltes/emt1.png"
    ],
    [
        "nome" => "Esmalte Risqué Azul Celeste",
        "preco" => 8.79,
        "descricao" => "Esmalte Cremoso 8ml",
        "imagem" => "images/esmaltes/emt1.png"
    ],
    [
        "nome" => "Esmalte Risqué Nude Elegante",
        "preco" => 10.90,
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
    <?php foreach ($listaFinal as $index => $produto): ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card text-center bg-light">
                <a href="#" class="position-absolute end-0 p-2 text-danger">
                    <i class="bi bi-suit-heart" style="font-size: 24px;"></i>
                </a>
                <a href="produto.php">
                    <img src="<?= $produto['imagem'] ?>" class="card-img-top" alt="<?= $produto['nome'] ?>">
                </a>
                <div class="card-header">R$ <?= number_format($produto['preco'], 2, ",", ".") ?></div>
                <div class="card-body">
                    <h5 class="card-title" style="height: 50px; font-size: 14px;"><?= $produto['nome'] ?></h5>
                    <p class="card-text truncar-3l"><?= $produto['descricao'] ?></p>
                </div>
                <div class="card-footer">
                    
                    <small class="text-success">Disponível</small>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>