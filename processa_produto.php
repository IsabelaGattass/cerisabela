<?php
// Carrega automaticamente as classes quando são chamadas
spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php"; // Inclui o arquivo da classe
});

// =======================
// CADASTRAR PRODUTO
// =======================
if (filter_has_var(INPUT_POST, "btnGravar")) { // Verifica se o botão "Gravar" foi enviado no formulário

    $produto = new Produto(); // Cria objeto da classe Produto

    // Seta os valores recebidos do formulário com filtros de segurança
    $produto->setNome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS)); // Nome do produto
    $produto->setDescricao(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS)); // Descrição
    $produto->setPreco(filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT)); // Preço (número decimal)
    $produto->setUnidade(filter_input(INPUT_POST, 'unidade', FILTER_VALIDATE_INT)); // Unidade (número inteiro)

    // Verifica se é edição ou cadastro novo (idProduto presente no POST indica edição)
    $idProduto = filter_input(INPUT_POST, "idProduto", FILTER_VALIDATE_INT);

    if (empty($idProduto)) { // Se não tem ID → cadastro novo
        // Tenta inserir produto no banco
        if ($produto->add()) {
            echo "<script>
                    alert('Produto cadastrado com sucesso!'); // Alerta sucesso
                    window.location.href='Produtos.php';     // Redireciona para a listagem
                  </script>";
        } else {
            echo "<script>
                    alert('Erro ao cadastrar produto.');     // Alerta erro
                    window.open(document.referrer,'_self');  // Volta para a página anterior
                  </script>";
        }
    } else { // Se tem ID → atualização de produto
        if ($produto->update('idProduto', $idProduto)) {
            echo "<script>
                    alert('Produto atualizado com sucesso!'); // Alerta sucesso
                    window.location.href='Produtos.php';      // Redireciona
                  </script>";
        } else {
            echo "<script>
                    alert('Erro ao atualizar produto.');      // Alerta erro
                    window.open(document.referrer,'_self');   // Volta para a página anterior
                  </script>";
        }
    }
}

// =======================
// EXCLUIR PRODUTO
// =======================
if (filter_has_var(INPUT_POST, "btnDeletar")) { // Verifica se o botão "Deletar" foi enviado

    $produto = new Produto(); // Cria objeto Produto
    $idProduto = filter_input(INPUT_POST, "idProduto", FILTER_VALIDATE_INT); // Captura o ID do produto

    if ($produto->delete("idProduto", $idProduto)) { // Se conseguiu excluir do banco
        header("Location: Produtos.php"); // Redireciona para a listagem
        exit; // Garante que o script não continua
    } else {
        echo "<script>
                alert('Erro ao excluir produto.'); // Alerta erro
                window.open(document.referrer, '_self'); // Volta para a página anterior
              </script>";
    }
}
