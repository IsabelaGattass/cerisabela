<?php
if (filter_has_var(INPUT_POST, "btnGravar")) {
    spl_autoload_register(function ($class) {
        require_once "classes/{$class}.class.php";
    });

    $usuario = new Usuario2();
    $usuario->setemail(filter_input(INPUT_POST, 'email'));
    $usuario->setsenha(password_hash($senha, PASSWORD_DEFAULT));


    if ($usuario-> add() ) {
        echo "<script>window.alert('Bem-vindo.'); window.location.href='LoginUsuario.php';</script>";
    } else {
        echo "<script>window.alert('Usuário Inválido.'); window.open(document.referrer,'_self');</script>";
    }
}

?>