<!DOCTYPE html>

<head lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
        <link rel="stylesheet" href="CSS/baseSite.css">
        <title>Tela de Login</title>

    </head>

<body>
        <?php require_once "_parts/_menu.php"; ?>
        <div class="flex-grow-1 d-flex justify-content-center align-items-center">
        <main class="container">

            <form action="Validacao.php" method="POST">
                <div class="mb-3 col-12">
                    <label for="email" class="form-label">Usuário</label>
                    <i class="bx bxs-user"></i>
                    <input type="text" class="form-control" id="email" name="email">
                </div>


                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <i class="bx bxs-lock-alt"></i>
                    <input type="password" class="form-control" id="senha" name="senha">
                </div>


                <div class="mb-12 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Confirmar</label>
                </div>

                <div class="text-center">
                    <button type="submit" name="btnGravar" class="btn btn-primary">Efetuar Login</button>
                </div>

                <a href="CadastroUsuario.php">Não tem conta? Cadastre-se</a>

                </div>

                

            </form>
                        
        </main>

           <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>

</body>

</html>








</html>