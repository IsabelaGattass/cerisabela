<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importando Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Cadastro Produto</title>
</head>
<?php
spl_autoload_register(function ($class) {
    require_once "classes/{$class}.class.php";
});
$produto = null;
if (isset($_POST['idProduto']) && !empty($_POST['idProduto'])) {

    $p = new Produto();
    $produto = $p->search('idProduto', $_POST['idProduto']);

}
?>

<body class="bg-light">
    <!-- Cabeçalho -->
    <header class="bg-primary text-white py-3 mb-4">
        <div class="container text-center">
            <h1 class="h3">Cadastro de Produto</h1>
        </div>
    </header>

    <main class="container">
        <!-- Alerta de erro (inicialmente escondido) -->
        <div id="alertaErro" class="alert alert-danger d-none" role="alert">
            Preencha todos os campos corretamente antes de cadastrar!
        </div>

        <!-- Formulário de cadastro/edição -->
        <form id="formProduto" method="post" action="processa_produto.php" class="row g-3 mt-3">

            <!-- Campo oculto para edição -->
            <input type="hidden" name="idProduto" value="<?= $produto->idProduto ?? '' ?>">

            <!-- Nome do Produto -->
            <div class="col-12">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto:" required
                    class="form-control" value="<?= htmlspecialchars($produto->nome ?? '') ?>">
            </div>

            <!-- Descrição -->
            <div class="col-12">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" name="descricao" id="descricao" placeholder="Digite a descrição:" required
                    class="form-control" value="<?= htmlspecialchars($produto->descricao ?? '') ?>">
            </div>

            <!-- Preço -->
            <div class="col-12">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" name="preco" id="preco" placeholder="Ex: 19,99" step="0.01" min="0" required
                    class="form-control" value="<?= htmlspecialchars($produto->preco ?? '') ?>">
            </div>

            <!-- Unidade -->
            <div class="col-12">
                <label for="unidade" class="form-label">Unidade</label>
                <input type="number" name="unidade" id="unidade" placeholder="Quantidade de produto:" step="1" min="1"
                    required class="form-control" value="<?= htmlspecialchars($produto->unidade ?? '') ?>">
            </div>

            <!-- Botão -->
            <div class="col-12">
                <button type="submit" name="btnGravar" id="btnGravar" class="btn btn-success">
                    <?= $produto ? 'Salvar Alterações' : 'Cadastrar' ?>
                </button>
            </div>
        </form>
    </main>

    <!-- Rodapé -->
    <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

    <!-- Importando Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Validação do formulário com JS -->
    <script>
        // Captura o formulário
        const form = document.getElementById("formProduto");
        // Captura o alerta de erro
        const alertaErro = document.getElementById("alertaErro");

        const preco = document.getElementById("preco");
        preco.addEventListener("input", function () {
            if (this.value.includes(",")) {
                this.value = this.value.replace(",", "."); // troca vírgula por ponto
            }
            // força 2 casas decimais ao sair do campo
            this.addEventListener("blur", function () {
                if (this.value) {
                    this.value = parseFloat(this.value).toFixed(2);
                }
            });
        });

        // Adiciona evento de submit
        form.addEventListener("submit", function (event) {
            // Pega valores dos campos
            const nome = document.getElementById("nome").value.trim();
            const descricao = document.getElementById("descricao").value.trim();
            const preco = document.getElementById("preco").value.trim();
            const unidade = document.getElementById("unidade").value.trim();

            // Valida se todos os campos foram preenchidos
            if (nome === "" || descricao === "" || preco === "" || unidade === "") {
                event.preventDefault(); // Impede envio
                alertaErro.classList.remove("d-none"); // Mostra alerta
                return;
            }

            // Valida se o preço é número decimal válido
            if (isNaN(preco) || parseFloat(preco) <= 0) {
                event.preventDefault();
                alertaErro.textContent = "O preço deve ser um número decimal válido!";
                alertaErro.classList.remove("d-none");
                return;
            }

            // Valida se a unidade é número inteiro válido
            if (isNaN(unidade) || !Number.isInteger(parseFloat(unidade)) || parseInt(unidade) <= 0) {
                event.preventDefault();
                alertaErro.textContent = "A unidade deve ser um número inteiro maior que zero!";
                alertaErro.classList.remove("d-none");
                return;
            }

            // Se passou em todas as validações, esconde alerta
            alertaErro.classList.add("d-none");
        });
    </script>

</body>

</html>