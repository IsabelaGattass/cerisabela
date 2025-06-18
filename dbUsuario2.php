<?php
if (filter_has_var(INPUT_POST, "btnGravar")) {
    spl_autoload_register(function ($class) {
        require_once "classes/{$class}.class.php";
    });

    $idFuncionario = new Usuario2();
    $idFuncionario->setemail(filter_input(INPUT_POST, 'email'));
    $idFuncionario->setsenha(password_hash($senha, PASSWORD_DEFAULT));


    if ($idFuncionario-> add() ) {
        echo "<script>window.alert('Bem-vindo.'); window.location.href='LoginUsuario.php';</script>";
    } else {
        echo "<script>window.alert('Usuário Inválido.'); window.open(document.referrer,'_self');</script>";
    }
}

?>