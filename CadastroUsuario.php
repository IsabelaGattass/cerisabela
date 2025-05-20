<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/baseAdmin.css">
    <title>Cadastro Usuário</title>
</head>

<body>

    <main class="container">
        <form method="post" action="dbUsuario.php" class="row g-3 mt-3">

            <div class="col-12">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o seu nome:" required class="form-control">
            </div>
            <div class="col-12">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite o seu CPF:" required class="form-control">
            </div>
            <div class="col-12">
                <label for="email" class="form-label">EMAIL</label>
                <input type="email" name="email" id="email" placeholder="Digite o seu Email:" required
                    class="form-control">
            </div>
            <div class="col-12">
                <label for="telefone" class="form-label">TELEFONE</label>
                <input type="text" name="telefone" id="telefone" placeholder="Digite o seu Telefone:" required
                    class="form-control">
            </div>
            <div class="col-12">
                <label for="senha" class="form-label">SENHA</label>
                <input type="password" name="senha" id="senha" placeholder="Digite a sua Senha:" required
                    class="form-control">
            </div>
            <div class="col-12">
                <label for="tipoFuncionario" class="form-label">SELECIONE SEU PAPEL</label>
                <select class="form-select" aria-label="Escolha seu papel:" name="tipoFuncionario">
                    <option selected>Selecione seu papel</option>
                    <option value="1">Administrador</option>
                    <option value="2">gerente</option>
                    <option value="3">funcionário</option>
                    <option value="4">cliente comum</option>
                    <option value="5">Supervisor</option>
                </select>
            </div>


            <div class="col-12">
                <button type="submit" name="btnGravar" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </main>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</html>