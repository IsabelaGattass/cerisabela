<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Recebe dados do formulário
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Aqui você faz a validação REAL
// Exemplo simples (troque pela validação no banco)
if ($email === "admin" && $senha === "123") {

    // Cria variáveis de sessão
    $_SESSION['user_id'] = 1;
    $_SESSION['email'] = $email;

    // Se tiver redirect na URL, volta pra página desejada
    if (isset($_GET['redirect'])) {
        $pagina = basename($_GET['redirect']);
        header("Location: $pagina");
        exit;
    }

    // Senão, vai para o index
    header("Location: index.php");
    exit;
} else {
    // Login falhou → volta para o login
    header("Location: login.php?erro=1");
    exit;
}
