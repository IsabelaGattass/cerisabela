<?php
// 1. Inicie a sessão AQUI
session_start();

// 2. Pega o ID enviado pelo JavaScript (via URL ?id=...)
$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$newState = ''; // Variável para guardar o novo estado

// 3. Verifica se o ID é válido e se a sessão de produtos existe
if ($productId > 0 && isset($_SESSION['produtos'])) {

    // 4. Procura o produto dentro da sessão
    foreach ($_SESSION['produtos'] as $index => $produto) {
        if ($produto['id'] === $productId) {

            // 5. Achou! Agora inverte o valor de 'heart'
            if ($_SESSION['produtos'][$index]['heart'] === '') {
                $_SESSION['produtos'][$index]['heart'] = '-fill';
            } else {
                $_SESSION['produtos'][$index]['heart'] = '';
            }

            // 6. Guarda o novo estado para devolver ao JavaScript
            $newState = $_SESSION['produtos'][$index]['heart'];

            // 7. Para o loop, pois já achamos o produto
            break;
        }
    }
}

// 8. Responde para o JavaScript em formato JSON
header('Content-Type: application/json');
echo json_encode(['newState' => $newState]);
exit;
