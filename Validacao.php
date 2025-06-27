<?php
session_start();

// validação de usuário e senha 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    spl_autoload_register(function ($class) {
        require_once "Classes/{$class}.class.php";
    });

    $Login = new Usuario();
    $dados = $Login->ValidarLogin($email);
    

    if (password_verify($senha, $dados->senha)) {
        $_SESSION['email'] = $dados->nome;
        header("Location: index.php");
        exit();
    } else {
         echo "<script>window.alert('Senha/Usuário incorreto.'); window.location.href='LoginUsuario.php';</script>";
    }
} else {
    header("Location: index.php");
    exit;
}

?>
