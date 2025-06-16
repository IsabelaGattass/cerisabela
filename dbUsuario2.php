<?php
if (filter_has_var(INPUT_POST, "btnLogin")) {
    spl_autoload_register(function ($class) {
        require_once "classes/{$class}.class.php";
    });

    $empreendedorismo = new Usuario2();
    $empreendedorismo->setusuario(filter_input(INPUT_POST, 'usuario'));
    $empreendedorismo->setsenha(password_hash($senha, PASSWORD_DEFAULT));


    if ($idFuncionario->add()) {
        echo "<script>window.alert('Usuario cadastrado com sucesso.'); window.location.href='LoginUsuario.php';</script>";
    } else {
        echo "<script>window.alert('Erro ao cadastrar usuario.'); window.open(document.referrer,'_self');</script>";
    }
}