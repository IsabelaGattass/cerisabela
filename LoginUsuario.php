<!DOCTYPE html>

<head lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
        <link rel="stylesheet" href="CSS/style.css">
        <title>Tela de Login</title>

    </head>


        <main class="container">
            <form action="Validacao.php" method="POST">
                <div class="col-md-12">
                    <input placeholder="Email" type="Email">
                    <i class="bx bxs-user"></i>
                </div>


                <div class="col-md-12">
                    <input placeholde="Senha" type="password">
                    <i class="bx bxs-lock-alt"></i>
                </div>


                <div class="mb-12 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Confirmar</label>
                    <a href="#">Esqueci minha senha</a>
                </div>

                <div class="col-3">
                    <button type="submit" name="btnGravar" class="btn btn-primary">Efetuar Login</button>
                </div>

                <div class="col-3"> 
                    <p> Não tem uma conta? <a href="CadastroUsuario.php"></a></p>

                </div>

            </form>
        </main>

</body>

   <footer>
        <?php require_once "_parts/_footer.php"; ?>
    </footer>







</html>