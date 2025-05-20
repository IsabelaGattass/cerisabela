<?php

if (filter_has_var(INPUT_POST, "btnGravar")) {
    spl_autoload_register(function ($cliente) {
        require_once "classes/{$cliente}.class.php";
    });

    $cliente= new Cliente;
    $cliente->setnome(filter_input(INPUT_POST, 'nome'));
    $cliente->setid(filter_input(INPUT_POST, 'id'));
    $cliente->setcpf(filter_input(INPUT_POST, 'cpf'));
    $cliente->setemail(filter_input(INPUT_POST, 'email'));
    $cliente->settelefone(filter_input(INPUT_POST, 'telefone'));
    $cliente->setsenha(filter_input(INPUT_POST, 'senha'));
    $cliente->setrua(filter_input(INPUT_POST, 'rua'));
    $cliente->setnumero(filter_input(INPUT_POST, 'numero'));
    $cliente->setcidade(filter_input(INPUT_POST, 'cidade'));
    $cliente->setbairro(filter_input(INPUT_POST, 'bairro'));
    $cliente->setestado(filter_input(INPUT_POST, 'estado'));
    $cliente->setcep(filter_input(INPUT_POST, 'cep'));
    $cliente->setdataNasc (filter_input(INPUT_POST, 'dataNasc '));

   
    if ($cliente->add()) {  
        echo "<script>window.alert('cliente cadastrado com sucesso.'); window.location.href='CadastroCliente.php';</script>";
    } else {
        echo "<script>window.alert('Erro ao cadastrar cliente.'); window.open(document.referrer,'_self');</script>";
    }
}