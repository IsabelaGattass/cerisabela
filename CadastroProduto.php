<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Cadastro Produto</title>
</head>

<body class="bg-ligth">
    <header class="bg-primary text-white py-3 mb -4">
        <div class=" container text-center">
            <h1 class="h3">Cadastro de Produto</h1>
        </div>
    </header>

    <main class="container">
        <form method="post" action="processa_produto.php" class="row g-3 mt-3">

            
             <div class="col-12">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto:" required class="form-control">
            </div>
             <div class="col-12">
                <label for="nome" class="form-label">Descrição</label>
                <input type="text" name="descricao" id="descricao" placeholder="Digite a descrição:" required class="form-control">
            </div>
             <div class="col-12">
                <label for="nome" class="form-label">Preço</label>
                <input type="text" name="preco" id="preco" placeholder="Preço do produto:" required class="form-control">
            </div>
            <div class="col-12">
                <label for="nome" class="form-label">Unidade</label>
                <input type="text" name="unidade" id="unidade" placeholder="Quantidade de produto:" required class="form-control">
            </div>
            <div class="col-12">
                <button type="submit" name="btnGravar" id="btnGravar" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</html>