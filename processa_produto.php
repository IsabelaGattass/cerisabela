<?php

if (filter_has_var(INPUT_POST, "button")) {
    spl_autoload_register(function ($produto) {
        require_once "classes/{$produto}.class.php";
    });

    $produto = new Produto();
    $produto->setNome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_ADD_SLASHES));
    $produto->setDescricao(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_ADD_SLASHES));
    $produto->setPreco(filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_ADD_SLASHES));
    $produto->setUnidade(filter_input(INPUT_POST, 'unidade', FILTER_SANITIZE_ADD_SLASHES));

   $idProduto = filter_input(INPUT_POST, "idProduto");

    if (empty($idProduto)) {
        // Cadastro novo
        if ($produto->add()) {
            echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href='Produtos.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar produto.'); window.open(document.referrer,'_self');</script>";
        }
    } else {
        // Edição de cliente já existente
        if ($produto->update('idProduto', $idProduto)) {
            echo "<script>alert('Produto atualizado com sucesso!'); window.location.href='Produtos.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar produto.'); window.open(document.referrer,'_self');</script>";
        }
    }
}

// Se clicou no botão de Deletar
if (filter_has_var(INPUT_POST, "btnDeletar")) {
    $idProduto = intval(filter_input(INPUT_POST, "idProduto"));
    
    if ($Produto->delete("idProduto", $idProduto)) {
        header("Location: Produtos.php");
    } else {
        echo "<script>alert('Erro ao excluir cliente.'); window.open(document.referrer, '_self');</script>";
    }
}
