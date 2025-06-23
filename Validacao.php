<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST,'senha', FILTER_SANITIZE_STRING);


    spl_autoload_register(callback: function ($class): void {
        require_once "Classes/{$class}.class.php";
    });

    $login = new Usuario();
    $dados = $login->buscarUsuario(email: $email);

    if ($dados) {
        if (password_verify(password: $senha, hash: $dados->senha)) {
            $_SESSION['usuario'] 
            = $dados->email;
            $_SESSION['id'] = $dados->id;
            header('Location: LoginUsuario.php');
            exit();
        } else {
            echo "<script>alert('Senha incorreta'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Usuário não encontrado'); window.history.back();</script>";
    }
} else {
    header('Location: LoginUsuario.php');
    exit;
}
?>