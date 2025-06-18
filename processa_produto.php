<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    spl_autoload_register(function ($class) {
        require_once "classes/{$class}.class.php";
    });

    $produto = new Produto();
    $produto->setNome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_ADD_SLASHES));
    $produto->setDescricao(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_ADD_SLASHES));
    $produto->setPreco(filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_ADD_SLASHES));
    $produto->setUnidade(filter_input(INPUT_POST, 'unidade', FILTER_SANITIZE_ADD_SLASHES));

    if (isset($_POST['btnGravar'])) {
        // Cadastro de novo produto
        if ($produto->add()) {
            echo "<script>alert('Produto cadastrado com sucesso.'); window.location.href='CadastroProduto.php';</script>";
        } else {
            echo "<script>alert('Erro ao adicionar Produto.'); window.location.href='CadastroProduto.php';</script>";
        }
    } elseif (isset($_POST['btnAlterar'])) {
        // Edição de produto existente
        $idProduto = filter_input(INPUT_POST, 'idProduto', FILTER_SANITIZE_NUMBER_INT);
        if ($produto->update($idProduto)) {
            echo "<script>alert('Produto alterado com sucesso.'); window.location.href='Produtos.php';</script>";
        } else {
            echo "<script>alert('Erro ao alterar Produto.'); window.location.href='Produtos.php';</script>";
        }
    } elseif (isset($_POST['btnDeletar'])) {
        // Exclusão de produto
        $idProduto = filter_input(INPUT_POST, 'idProduto', FILTER_SANITIZE_NUMBER_INT);
        if ($produto->delete($idProduto)) {
            echo "<script>alert('Produto excluído com sucesso.'); window.location.href='Produtos.php';</script>";
        } else {
            echo "<script>alert('Erro ao excluir Produto.'); window.location.href='Produtos.php';</script>";
        }
    }
}
?>