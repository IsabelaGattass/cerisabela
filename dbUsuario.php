<?php
if (filter_has_var(INPUT_POST, "btnGravar")) {
    spl_autoload_register(function ($class) {
        require_once "classes/{$class}.class.php";
    });

    $idFuncionario = new Usuario();
    $idFuncionario->setnome(filter_input(INPUT_POST, 'nome'));
    $idFuncionario->setcpf(filter_input(INPUT_POST, 'cpf'));
    $idFuncionario->setidFuncionario(filter_input(INPUT_POST, 'idFuncionario '));
    $idFuncionario->setemail(filter_input(INPUT_POST, 'email'));
    $idFuncionario->settelefone(filter_input(INPUT_POST, 'telefone'));
    $idFuncionario->setsenha(filter_input(INPUT_POST, 'senha'));
    $idFuncionario->settipoFuncionario(filter_input(INPUT_POST, 'tipoFuncionario'));

    if ($idFuncionario->add()) {
        echo "<script>window.alert('Usuario cadastrado com sucesso.'); window.location.href='CadastroUsuario.php';</script>";
    } else {
        echo "<script>window.alert('Erro ao cadastrar usuario.'); window.open(document.referrer,'_self');</script>";
    }
}