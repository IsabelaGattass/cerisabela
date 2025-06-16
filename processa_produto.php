<?php 
if(filter_has_var(INPUT_POST, "btnGravar")) {
    spl_autoload_register(function ($class) {
     require_once "classes/{$class}.class.php";
     
    });

 $produto = new Produto();
 $produto->setNome(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_ADD_SLASHES));
 $produto->setDescricao(filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_ADD_SLASHES));
 $produto->setPreco(filter_input(INPUT_POST, "preco", FILTER_SANITIZE_ADD_SLASHES));
 $produto->setUnidade(filter_input(INPUT_POST, "unidade", FILTER_SANITIZE_ADD_SLASHES));

   if ($produto->add()) {
        echo "<script>window.alert('Produto cadastrado com sucesso.'); window.location.href='CadastroProduto.php';</script>";
    } else {
        echo "<script>window.alert('Erro ao cadastrar produto.'); window.open(document.referrer,'_self');</script>";
    }
}