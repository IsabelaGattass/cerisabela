<?php
// inicio da sessão
session_start();

// confirma se o envio da página foi realmente feito com botao
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // pega o que foi digitado nos campos das telas de login (email, senha)
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    // ativa o carregamento automático d classes. quando criar um novo objeto com new, ele vai buscar o arquivo correspondente 
    spl_autoload_register(function ($class) {
        require_once "Classes/{$class}.class.php";
    });


    // cria um objeto novo da classe Usuário
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
