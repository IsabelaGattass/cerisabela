<?php

if (filter_has_var(INPUT_POST, "button")) {
    spl_autoload_register(function ($cliente) {
        require_once "classes/{$cliente}.class.php";
    });

    $Cliente= new cliente;
    $Cliente->setNome(filter_input(INPUT_POST, 'nome'));
    $Cliente->setCpf(filter_input(INPUT_POST, 'cpf'));
    $Cliente->setEmail(filter_input(INPUT_POST, 'email'));
    $Cliente->setTelefone(filter_input(INPUT_POST, 'telefone'));
    $Cliente->setSenha(filter_input(INPUT_POST, 'senha'));
    $Cliente->setRua(filter_input(INPUT_POST, 'rua'));
    $Cliente->setNumero(filter_input(INPUT_POST, 'numero'));
    $Cliente->setCidade(filter_input(INPUT_POST, 'cidade'));
    $Cliente->setBairro(filter_input(INPUT_POST, 'bairro'));
    $Cliente->setEstado(filter_input(INPUT_POST, 'estado'));
    $Cliente->setCep(filter_input(INPUT_POST, 'cep'));
    $Cliente->setDataNasc (filter_input(INPUT_POST, 'DataNasc'));
    


   
    if ($Cliente->add()) {  
        echo "<script>window.alert('cliente cadastrado com sucesso.'); window.location.href='CadastroCliente.php';</script>";
    } else {
        echo "<script>window.alert('Erro ao cadastrar cliente.'); window.open(document.referrer,'_self');</script>";
    }
}