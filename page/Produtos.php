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
                    <form method="post" action="page/carrinho.php">
                        <input type="hidden" name="nome" value="<?= $produto['nome'] ?>">
                        <input type="hidden" name="preco" value="<?= $produto['preco'] ?>">
                        <input type="hidden" name="descricao" value="<?= $produto['descricao'] ?>">
                        <input type="hidden" name="img" value="<?= $produto['imagem'] ?>">
                        <input type="hidden" name="qtd" value="1">
                        <button type="submit" class="btn btn-outline-info">Adicionar ao Carrinho</button>
                    </form>
                    <small class="text-success">Disponível</small>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
 <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#formModal">
            Para realizar pedido 
        </button>
    </div>
</div>
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Formulário de Contato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="processar_formulario.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">cerisabela</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="mb-3">
                  <a href="https://web.whatsapp.com/" class="whatsapp" target="_blank"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    <div class="mb-3">
                        <label for="mensagem" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="mensagem" name="mensagem" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="horario" class="form-label">Horário de Atendimento</label>
                        <input type="text" class="form-control" id="horario" value="Segunda a Sexta, das 9h às 18h" disabled>
                    </div>

                    <!-- Política de privacidade com checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="politica" name="politica" required>
                        <label class="form-check-label" for="politica">
                            Eu li e aceito a <a href="#" data-bs-toggle="modal" data-bs-target="#politicaModal">Política de Privacidade</a>.
                        </label>
                    </div>

                    <!-- Botão de envio -->
                    <button type="submit" class="btn btn-primary mt-3">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal da Política de Privacidade -->
<div class="modal fade" id="politicaModal" tabindex="-1" aria-labelledby="politicaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="politicaModalLabel">Política de Privacidade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Política de Privacidade - Exemplo</h6>
                <p>Aqui, você explica como os dados dos usuários serão coletados, armazenados e usados, além de assegurar que a privacidade será respeitada.</p>
                <p>Você pode incluir informações sobre o uso de cookies, compartilhamento de dados e a conformidade com as regulamentações de privacidade, como a LGPD.</p>
            </div>
        </div>
    </div>
</div>