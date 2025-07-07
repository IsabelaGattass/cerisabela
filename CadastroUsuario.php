<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Cadastro Usuário</title>
</head>

<body class="bg-ligth">
    <header class="bg-primary text-white py-3 mb -4">
        <div class=" container text-center">
            <h1 class="h3">Cadastro de Usuário</h1>
        </div>
    </header>

    <main class="container">
        <form method="post" action="dbUsuario.php" class="row g-3 mt-3">

            <div class="col-12">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o seu nome:" required class="form-control">
            </div>

            <div class="col-12">
                <label for="email" class="form-label">EMAIL</label>
                <input type="email" name="email" id="email" placeholder="Digite o seu Email:" required
                    class="form-control">
            </div>
            
            <div class="col-12">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite o seu CPF:" required class="form-control">
            </div>

            <div class="col-12">
                <label for="cliente" class="form-label"> TELEFONE</label>
                <input type="text" name="telefone" id="telefone" placeholder="+XX X XXX XXX-XXXX."
                    placeholder="digite a sua senha " required class="form-control">
            </div>

            <div class="col-md-12">
                <label for="cliente" class="form-label">SENHA</label>
                <input type="password" name="senha" id="senha" placeholder="Digite a sua senha:" required
                    class="form-control">
            </div>
            <div class="col-12">
                <label for="tipoFuncionario" class="form-label">SELECIONE SEU PAPEL</label>
                <select class="form-select" aria-label="Escolha seu papel:" name="tipoFuncionario">
                    <option selected>Selecione seu papel</option>
                    <option value="1">Administrador</option>
                    <option value="2">Gerente</option>
                    <option value="3">Funcionário</option>
                    <option value="4">Cliente Comum</option>
                    <option value="5">Supervisor</option>
                </select>
            </div>

            <div class="col-12">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Confirme suas informações</label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" name="btnGravar" id="button" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </main>
       <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</html>