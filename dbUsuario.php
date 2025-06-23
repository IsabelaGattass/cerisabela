<?php
if (filter_has_var(INPUT_POST, "btnGravar")) {
    spl_autoload_register(function ($class) {
        require_once "classes/{$class}.class.php";
    });

    $usuario = new Usuario();
    $usuario->setnome(filter_input(INPUT_POST, 'nome'));
    $usuario->setcpf(filter_input(INPUT_POST, 'cpf'));
    $usuario->setidFuncionario(filter_input(INPUT_POST, 'idFuncionario '));
    $usuario->setemail(filter_input(INPUT_POST, 'email'));
    $usuario->settelefone(filter_input(INPUT_POST, 'telefone'));
    $usuario->setsenha(password_hash(INPUT_POST, 'senha'));
    $usuario->settipoFuncionario(filter_input(INPUT_POST, 'tipoFuncionario'));

    if ($usuario->add()) {
        echo "<script>window.alert('Usuario cadastrado com sucesso.'); window.location.href='CadastroUsuario.php';</script>";
    } else {
        echo "<script>window.alert('Erro ao cadastrar usuario.'); window.open(document.referrer,'_self');</script>";
    }
}