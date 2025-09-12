<?php

if (filter_has_var(INPUT_POST, "button")) {
    spl_autoload_register(function ($cliente) {
        require_once "classes/{$cliente}.class.php";
    });

    $Cliente= new cliente;
    $Cliente->setId(filter_input(INPUT_POST, 'id'));
    $Cliente->setNome(filter_input(INPUT_POST, 'nome'));
    $Cliente->setCpf(filter_input(INPUT_POST, 'cpf'));
    $Cliente->setEmail(filter_input(INPUT_POST, 'email'));
    $Cliente->setTelefone(filter_input(INPUT_POST, 'telefone'));
    $Cliente->setSenha(filter_input(INPUT_POST, 'senha'));
    $Cliente->setNumero(filter_input(INPUT_POST, 'numero'));
    $Cliente->setCidade(filter_input(INPUT_POST, 'cidade'));
    $Cliente->setBairro(filter_input(INPUT_POST, 'bairro'));
    $Cliente->setEstado(filter_input(INPUT_POST, 'estado'));
    $Cliente->setCep(filter_input(INPUT_POST, 'cep'));
    $Cliente->setDataNasc (filter_input(INPUT_POST, 'DataNasc'));
    

    // Verifica se é cadastro novo ou edição
    $id = filter_input(INPUT_POST, "id");

    if (empty($id)) {
        // Cadastro novo
        if ($Cliente->add()) {
            echo "<script>alert('Cliente cadastrado com sucesso!'); window.location.href='Cadastrados.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar cliente.'); window.open(document.referrer,'_self');</script>";
        }
    } else {
        // Edição de cliente já existente
        if ($Cliente->update('id', $id)) {
            echo "<script>alert('Cliente atualizado com sucesso!'); window.location.href='Cadastrados.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar cliente.'); window.open(document.referrer,'_self');</script>";
        }
    }
}

// Se clicou no botão Deletar
if (filter_has_var(INPUT_POST, "btnDeletar")) {
    $id = intval(filter_input(INPUT_POST, "id"));
    
    if ($Cliente->delete("id", $id)) {
        header("Location: Cadastrados.php");
    } else {
        echo "<script>alert('Erro ao excluir cliente.'); window.open(document.referrer, '_self');</script>";
    }
}
